<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\TwoFactorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\InvoiceController;

// Redirect Fortify's /login to admin login (Fortify is installed but unused)
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// =============================================
// PUBLIC SITE ROUTES
// =============================================
Route::get('/', function () { return view('welcome'); });
Route::get('/home', [PageController::class, 'home'])->name('home.page');
Route::get('/about', [PageController::class, 'about'])->name('about.page');
Route::get('/services', [PageController::class, 'services'])->name('services.page');
Route::get('/contact', [PageController::class, 'contact'])->name('contact.page');
Route::post('/contact/submit', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/blog', [PageController::class, 'blogList'])->name('blog.list');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');

// =============================================
// ADMIN PORTAL ROUTES
// =============================================
// Email verification — uses Laravel's required route names, under /admin/ URL prefix
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('email/verify', fn() => view('admin.verify-email'))
        ->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('admin.dashboard')->with('success', 'Email verified successfully.');
    })->middleware('signed')->name('verification.verify');
    Route::post('email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (unauthenticated)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Two-factor authentication
    Route::get('2fa', [TwoFactorController::class, 'showForm'])->name('2fa.form');
    Route::post('2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');
    Route::post('2fa/resend', [TwoFactorController::class, 'resend'])->middleware('throttle:3,1')->name('2fa.resend');

    // Password reset
    Route::get('forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

    // Protected admin routes
    Route::middleware(['admin'])->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Clients
        Route::resource('clients', ClientController::class);

        // Invoices
        Route::resource('invoices', InvoiceController::class);
        Route::get('invoices/{invoice}/pdf', [InvoiceController::class, 'downloadPdf'])->name('invoices.pdf');
        Route::post('invoices/{invoice}/send', [InvoiceController::class, 'send'])->name('invoices.send');
        Route::post('invoices/{invoice}/mark-paid', [InvoiceController::class, 'markPaid'])->name('invoices.mark-paid');
    });
});