<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InviteAdmin extends Command
{
    protected $signature = 'admin:invite
        {email : Email address of the new admin}
        {--name= : Display name (defaults to the part of the email before the @)}
        {--role=super_admin : super_admin, manager or customer_service}';

    protected $description = 'Create an admin account and email the person a link to set their password';

    public function handle(): int
    {
        $email = Str::lower($this->argument('email'));
        $role = $this->option('role');
        $name = $this->option('name') ?: Str::headline(Str::before($email, '@'));

        $validator = Validator::make(
            ['email' => $email, 'role' => $role],
            ['email' => ['required', 'email', 'unique:users,email'], 'role' => ['in:super_admin,manager,customer_service']],
            ['email.unique' => 'A user with that email already exists.', 'role.in' => 'Role must be super_admin, manager or customer_service.']
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        // Random password nobody knows: the invitee sets their own via the emailed link.
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Str::random(40),
            'is_admin' => true,
            'role' => $role,
        ]);
        $user->forceFill(['email_verified_at' => now()])->save();

        $token = Password::broker()->createToken($user);

        try {
            $user->sendPasswordResetNotification($token);
            $this->info("Invited {$name} <{$email}> as {$role}. A set-password link was emailed to them.");
        } catch (\Throwable $e) {
            report($e);
            $this->warn("Account created for {$email}, but the email could not be sent ({$e->getMessage()}).");
            $this->line('Send them this link instead:');
            $this->line(route('admin.password.reset', ['token' => $token, 'email' => $email]));
        }

        $minutes = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
        $this->line("The link expires in {$minutes} minutes. After that they can use \"Forgot password\" on the login page.");

        return self::SUCCESS;
    }
}
