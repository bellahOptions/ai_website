<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [PageController::class, 'home'])->name('home.page');
Route::get('/about', [PageController::class, 'about'])->name('about.page');
Route::get('/services', [PageController::class, 'services'])->name('services.page');
Route::get('/contact', [PageController::class, 'contact'])->name('contact.page');