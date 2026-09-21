<?php

namespace App\Services;

use App\Mail\AdminLoginCode;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Email one-time passcodes for the admin second factor.
 *
 * Only an HMAC of the code is stored (in the cache), so a leaked cache
 * or database row can't be replayed. Codes expire, are single-use, and
 * lock after too many wrong guesses.
 */
class EmailOtp
{
    public const TTL_SECONDS = 600;
    public const MAX_ATTEMPTS = 5;
    public const RESEND_COOLDOWN_SECONDS = 60;

    public function hasActive(User $user): bool
    {
        return Cache::has($this->key($user));
    }

    public function secondsUntilResend(User $user): int
    {
        $until = Cache::get($this->cooldownKey($user));

        return $until ? max(0, $until - now()->timestamp) : 0;
    }

    /** Generate a fresh code (invalidating any previous one) and email it. */
    public function send(User $user): void
    {
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        Cache::put($this->key($user), [
            'hash' => $this->hash($code),
            'attempts' => 0,
            'expires_at' => now()->addSeconds(self::TTL_SECONDS)->timestamp,
        ], self::TTL_SECONDS);

        Cache::put(
            $this->cooldownKey($user),
            now()->addSeconds(self::RESEND_COOLDOWN_SECONDS)->timestamp,
            self::RESEND_COOLDOWN_SECONDS
        );

        try {
            Mail::to($user->email)->send(new AdminLoginCode($user, $code, intdiv(self::TTL_SECONDS, 60)));
        } catch (\Throwable $e) {
            $this->clear($user);
            throw $e;
        } finally {
            if (app()->environment('local')) {
                Log::info("Admin email OTP for {$user->email}: {$code}");
            }
        }
    }

    public function verify(User $user, string $code): bool
    {
        $data = Cache::get($this->key($user));

        if (!$data) {
            return false;
        }

        if ($data['attempts'] >= self::MAX_ATTEMPTS) {
            $this->clear($user);

            return false;
        }

        if (hash_equals($data['hash'], $this->hash($code))) {
            $this->clear($user);

            return true;
        }

        $data['attempts']++;
        Cache::put($this->key($user), $data, max(1, $data['expires_at'] - now()->timestamp));

        return false;
    }

    public function clear(User $user): void
    {
        Cache::forget($this->key($user));
        Cache::forget($this->cooldownKey($user));
    }

    public function maskedEmail(User $user): string
    {
        [$local, $domain] = explode('@', $user->email, 2) + [1 => ''];

        return Str::mask($local, '*', 1, max(0, strlen($local) - 2)) . '@' . $domain;
    }

    private function hash(string $code): string
    {
        return hash_hmac('sha256', $code, (string) config('app.key'));
    }

    private function key(User $user): string
    {
        return "admin_email_otp:{$user->id}";
    }

    private function cooldownKey(User $user): string
    {
        return "admin_email_otp_cooldown:{$user->id}";
    }
}
