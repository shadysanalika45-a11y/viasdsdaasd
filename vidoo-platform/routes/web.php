<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Client\AuthController as ClientAuthController;
use App\Http\Controllers\Creator\AuthController as CreatorAuthController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Creator\DashboardController as CreatorDashboardController;
use Illuminate\Support\Facades\Route;

// Website Routes
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/creators', [WebsiteController::class, 'creators'])->name('creators');
Route::get('/price', [WebsiteController::class, 'pricing'])->name('pricing');
Route::get('/brands', [WebsiteController::class, 'brands'])->name('brands');
Route::get('/agencies', [WebsiteController::class, 'agencies'])->name('agencies');
Route::get('/ecommerce', [WebsiteController::class, 'ecommerce'])->name('ecommerce');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('contact');
Route::get('/policy', [WebsiteController::class, 'policy'])->name('policy');
Route::get('/conditions', [WebsiteController::class, 'conditions'])->name('conditions');
Route::get('/refund', [WebsiteController::class, 'refund'])->name('refund');
Route::get('/package-policy', [WebsiteController::class, 'packagePolicy'])->name('package-policy');

// Authentication Routes
Route::get('/login', [ClientAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [ClientAuthController::class, 'login']);
Route::post('/logout', [ClientAuthController::class, 'logout'])->name('logout');

// Client Routes
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/register', [ClientAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [ClientAuthController::class, 'register']);

    Route::middleware(['auth:client'])->group(function () {
        Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    });
});

// Creator Routes
Route::prefix('creator')->name('creator.')->group(function () {
    Route::get('/register', [CreatorAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [CreatorAuthController::class, 'register']);

    Route::middleware(['auth:creator'])->group(function () {
        Route::get('/dashboard', [CreatorDashboardController::class, 'index'])->name('dashboard');
    });
});
