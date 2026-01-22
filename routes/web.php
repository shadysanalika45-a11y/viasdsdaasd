<?php

use App\Http\Controllers\Admin\CmsSectionController;
use App\Http\Controllers\Admin\ManualPaymentController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\BuyerController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\CreatorController;
use App\Http\Controllers\Install\InstallController;
use Illuminate\Support\Facades\Route;

Route::middleware('install.check')->group(function () {
    Route::view('/', 'pages.home')->name('home');
    Route::view('/pricing', 'pages.pricing')->name('pricing');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::view('/login', 'auth.login')->name('login.form');
    Route::view('/register', 'auth.register')->name('register.form');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

        Route::middleware('role:buyer')->group(function () {
            Route::get('/dashboard/buyer', [BuyerController::class, 'index'])->name('dashboard.buyer');
        });

        Route::middleware('role:company')->group(function () {
            Route::get('/dashboard/company', [CompanyController::class, 'index'])->name('dashboard.company');
        });

        Route::middleware('role:creator')->group(function () {
            Route::get('/dashboard/creator', [CreatorController::class, 'index'])->name('dashboard.creator');
        });

        Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::resource('cms-sections', CmsSectionController::class)->only(['index', 'edit', 'update']);
            Route::get('manual-payments', [ManualPaymentController::class, 'index'])->name('manual-payments.index');
            Route::post('manual-payments/{proof}/approve', [ManualPaymentController::class, 'approve'])->name('manual-payments.approve');
            Route::post('manual-payments/{proof}/reject', [ManualPaymentController::class, 'reject'])->name('manual-payments.reject');
            Route::resource('users', UserManagementController::class)->only(['index', 'edit', 'update']);
        });
    });
});

Route::prefix('install')->name('install.')->middleware('install.guard')->group(function () {
    Route::get('/', [InstallController::class, 'requirements'])->name('requirements');
    Route::post('/requirements', [InstallController::class, 'requirementsSubmit'])->name('requirements.submit');
    Route::get('/database', [InstallController::class, 'database'])->name('database');
    Route::post('/database', [InstallController::class, 'databaseSubmit'])->name('database.submit');
    Route::get('/settings', [InstallController::class, 'settings'])->name('settings');
    Route::post('/settings', [InstallController::class, 'settingsSubmit'])->name('settings.submit');
    Route::get('/admin', [InstallController::class, 'admin'])->name('admin');
    Route::post('/admin', [InstallController::class, 'adminSubmit'])->name('admin.submit');
    Route::get('/migrate', [InstallController::class, 'migrate'])->name('migrate');
    Route::post('/migrate', [InstallController::class, 'migrateSubmit'])->name('migrate.submit');
    Route::get('/finish', [InstallController::class, 'finish'])->name('finish');
});
