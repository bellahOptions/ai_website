<?php

use App\Mail\AdminLoginCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

function adminUser(array $attrs = []): User
{
    return User::factory()->create(array_merge([
        'is_admin' => true,
        'role' => 'super_admin',
        'email' => 'boss@example.com',
        'email_verified_at' => now(),
        'password' => 'secret-pass',
    ], $attrs));
}

function signIn(User $user)
{
    return test()->post(route('admin.login.submit'), ['email' => $user->email, 'password' => 'secret-pass']);
}

function sentCode(): string
{
    $code = null;
    Mail::assertSent(AdminLoginCode::class, function ($mail) use (&$code) {
        $code = $mail->code;

        return true;
    });

    return $code;
}

beforeEach(fn () => Mail::fake());

it('sends an email code after the password step and blocks the portal until it is entered', function () {
    $user = adminUser();

    signIn($user)->assertRedirect(route('admin.2fa.form'));
    $this->get(route('admin.2fa.form'))->assertOk()->assertSee('b**s@example.com', false);

    $code = sentCode();
    expect($code)->toMatch('/^\d{6}$/');

    $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));

    signIn($user);
    $this->get(route('admin.2fa.form'));
    $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => sentCode()])
        ->assertRedirect(route('admin.dashboard'));
    $this->get(route('admin.dashboard'))->assertOk();
});

it('rejects a wrong code and a reused code', function () {
    $user = adminUser();
    signIn($user);
    $this->get(route('admin.2fa.form'));
    $code = sentCode();
    $wrong = $code === '000000' ? '111111' : '000000';

    $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => $wrong])
        ->assertRedirect(route('admin.2fa.form', ['method' => 'email']))
        ->assertSessionHasErrors('code');

    $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => $code])
        ->assertRedirect(route('admin.dashboard'));

    // Code is single-use: a fresh sign-in cannot reuse it.
    auth()->logout();
    $this->flushSession();
    signIn($user);
    $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => $code])
        ->assertSessionHasErrors('code');
});

it('locks the code after too many wrong guesses', function () {
    $user = adminUser();
    signIn($user);
    $this->get(route('admin.2fa.form'));
    $code = sentCode();
    $wrong = $code === '000000' ? '111111' : '000000';

    foreach (range(1, 5) as $_) {
        $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => $wrong]);
    }

    $this->post(route('admin.2fa.verify'), ['method' => 'email', 'code' => $code])
        ->assertSessionHasErrors('code');
    $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
});

it('only offers the authenticator switch to users who enabled it', function () {
    $plain = adminUser();
    signIn($plain);
    $this->get(route('admin.2fa.form', ['method' => 'totp']))
        ->assertOk()
        ->assertSee('Check your email')
        ->assertDontSee('Use authenticator app instead');

    $this->post(route('admin.2fa.verify'), ['method' => 'totp', 'code' => '123456'])
        ->assertRedirect(route('admin.2fa.form'));
    $this->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
});

it('lets a user with an authenticator app switch to it', function () {
    $user = adminUser(['two_factor_confirmed_at' => now()]);
    signIn($user);

    $this->get(route('admin.2fa.form'))->assertSee('Use authenticator app instead');
    $this->get(route('admin.2fa.form', ['method' => 'totp']))
        ->assertOk()
        ->assertSee('Enter authenticator code')
        ->assertSee('Email me a code instead');
});

it('does not allow enrolling an authenticator before passing the email code', function () {
    $user = adminUser();
    signIn($user);

    // Fortify's enable/confirm endpoints sit behind the admin middleware too.
    expect(config('fortify.middleware'))->toContain('admin');
    $this->get(route('admin.2fa.setup'))->assertRedirect(route('admin.login'));
    expect($user->fresh()->two_factor_secret)->toBeNull();
});
