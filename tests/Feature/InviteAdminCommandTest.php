<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

it('creates an admin and sends a set-password link', function () {
    Notification::fake();

    $this->artisan('admin:invite', ['email' => 'New.Admin@Example.com', '--name' => 'New Admin', '--role' => 'manager'])
        ->assertSuccessful();

    $user = User::where('email', 'new.admin@example.com')->firstOrFail();
    expect((bool) $user->is_admin)->toBeTrue()
        ->and($user->role)->toBe('manager')
        ->and($user->email_verified_at)->not->toBeNull();

    Notification::assertSentTo($user, ResetPassword::class);
});

it('rejects duplicates and invalid roles', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    $this->artisan('admin:invite', ['email' => 'taken@example.com'])->assertFailed();
    $this->artisan('admin:invite', ['email' => 'x@example.com', '--role' => 'owner'])->assertFailed();
    expect(User::where('email', 'x@example.com')->exists())->toBeFalse();
});
