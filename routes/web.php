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
use App\Http\Controllers\Admin\PortfolioController;

// Redirect Fortify's /login to admin login (Fortify is installed but unused)
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// =============================================
// PUBLIC SITE ROUTES
// =============================================
Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home.page');
Route::get('/about', [PageController::class, 'about'])->name('about.page');
Route::get('/services', [PageController::class, 'services'])->name('services.page');
Route::get('/contact', [PageController::class, 'contact'])->name('contact.page');
Route::post('/contact/submit', [PageController::class, 'submitContact'])->name('contact.submit');
Route::post('/newsletter/subscribe', [PageController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

Route::get('/blog', [PageController::class, 'blogList'])->name('blog.list');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');

Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio.page');

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

    // Two-factor authentication (TOTP via Fortify's underlying provider)
    Route::middleware('auth')->group(function () {
        Route::get('2fa', [TwoFactorController::class, 'showForm'])->name('2fa.form');
        Route::post('2fa/verify', [TwoFactorController::class, 'verify'])->middleware('throttle:5,1')->name('2fa.verify');
        Route::get('2fa/setup', [TwoFactorController::class, 'showSetup'])->name('2fa.setup');
        Route::post('2fa/setup/complete', [TwoFactorController::class, 'completeSetup'])->name('2fa.setup.complete');
    });

    // Password reset
    Route::get('forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

    // Protected admin routes
    Route::middleware(['admin'])->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Clients — read access for both roles, write access for Super Admin only
        Route::resource('clients', ClientController::class)->only(['index', 'show']);
        Route::middleware(['super_admin'])->group(function () {
            Route::resource('clients', ClientController::class)->except(['index', 'show']);
        });

        // Invoices
        Route::resource('invoices', InvoiceController::class);
        Route::get('invoices/{invoice}/pdf', [InvoiceController::class, 'downloadPdf'])->name('invoices.pdf');
        Route::post('invoices/{invoice}/send', [InvoiceController::class, 'send'])->name('invoices.send');
        Route::post('invoices/{invoice}/mark-paid', [InvoiceController::class, 'markPaid'])->name('invoices.mark-paid');

        // Portfolio
        Route::resource('portfolio', PortfolioController::class)->except(['show']);
    });
});