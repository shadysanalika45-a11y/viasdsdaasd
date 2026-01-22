<?php

use App\Http\Controllers\Admin\CmsSectionController;
use App\Http\Controllers\Admin\ManualPaymentController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\BalanceController;
use App\Http\Controllers\Dashboard\BuyerController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\CreatorController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Install\InstallController;
use App\Http\Controllers\Pages\AgenciesController;
use App\Http\Controllers\Pages\BrandsController;
use App\Http\Controllers\Pages\ClientRegisterController;
use App\Http\Controllers\Pages\ConditionsController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\CreatorRegisterController;
use App\Http\Controllers\Pages\CreatorsController;
use App\Http\Controllers\Pages\EcommerceController;
use App\Http\Controllers\Pages\ForgetPasswordController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\LoginPageController;
use App\Http\Controllers\Pages\PackagePolicyController;
use App\Http\Controllers\Pages\PolicyController;
use App\Http\Controllers\Pages\PricingController;
use App\Http\Controllers\Pages\RefundController;
use Illuminate\Support\Facades\Route;

Route::middleware(['install.check', \App\Http\Middleware\SetLocaleMiddleware::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/lang/{locale}', function (string $locale) {
        if (! in_array($locale, ['ar', 'en'], true)) {
            abort(404);
        }

        session(['locale' => $locale]);

        return back();
    })->name('locale.switch');
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
    Route::get('/creators', [CreatorsController::class, 'index'])->name('creators');
    Route::get('/agencies', [AgenciesController::class, 'index'])->name('agencies');
    Route::get('/brands', [BrandsController::class, 'index'])->name('brands');
    Route::get('/ecommerce', [EcommerceController::class, 'index'])->name('ecommerce');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
    Route::get('/conditions', [ConditionsController::class, 'index'])->name('conditions');
    Route::get('/policy', [PolicyController::class, 'index'])->name('policy');
    Route::get('/refund', [RefundController::class, 'index'])->name('refund');
    Route::get('/package-policy', [PackagePolicyController::class, 'index'])->name('package.policy');
    Route::get('/login', [LoginPageController::class, 'index'])->name('login.form');
    Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('password.request');
    Route::post('/forget-password', [ForgetPasswordController::class, 'submit'])->name('password.email');
    Route::get('/register', [ClientRegisterController::class, 'index'])->name('register.form');
    Route::get('/creator/register', [CreatorRegisterController::class, 'index'])->name('creator.register');
    Route::get('/client/register', [ClientRegisterController::class, 'index'])->name('client.register');
    Route::post('/support/agencies', [AgenciesController::class, 'submit'])->name('agencies.submit');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

        Route::middleware('role:buyer')->group(function () {
            Route::get('/dashboard/buyer', [BuyerController::class, 'index'])->name('dashboard.buyer');
            Route::get('/dashboard/client', [ClientController::class, 'index'])->name('dashboard.client');
            Route::get('/dashboard/client/search', [ClientController::class, 'search'])->name('client.search');
            Route::get('/dashboard/client/notifications', [ClientController::class, 'notifications'])->name('client.notifications');
            Route::get('/dashboard/client/messages', [ClientController::class, 'messages'])->name('client.messages');
            Route::get('/dashboard/client/subscription', [ClientController::class, 'subscription'])->name('client.subscription');
            Route::get('/dashboard/client/balance', [BalanceController::class, 'client'])->name('client.balance');
            Route::get('/dashboard/client/marketing', [ClientController::class, 'marketing'])->name('client.marketing');
            Route::get('/dashboard/client/orders', [ClientController::class, 'orders'])->name('client.orders');
            Route::get('/dashboard/client/request-video', [ClientController::class, 'requestVideo'])
                ->name('client.request-video');
            Route::post('/dashboard/client/balance/add', [BalanceController::class, 'add'])->name('add.balance');
            Route::post('/dashboard/client/transactions/{transaction}/confirm', [BalanceController::class, 'confirm'])
                ->name('client.transactions.confirm');
        });

        Route::middleware('role:company')->group(function () {
            Route::get('/dashboard/company', [CompanyController::class, 'index'])->name('dashboard.company');
        });

        Route::middleware('role:creator')->group(function () {
            Route::get('/dashboard/creator', [CreatorController::class, 'index'])->name('dashboard.creator');
            Route::get('/dashboard/creator/add-video', [CreatorController::class, 'addVideo'])->name('creator.add-video');
            Route::get('/dashboard/creator/blog', [CreatorController::class, 'blog'])->name('creator.blog');
            Route::get('/dashboard/creator/orders', [CreatorController::class, 'orders'])->name('creator.orders');
            Route::get('/dashboard/creator/messages', [CreatorController::class, 'messages'])->name('creator.messages');
            Route::get('/dashboard/creator/notifications', [CreatorController::class, 'notifications'])
                ->name('creator.notifications');
            Route::get('/dashboard/creator/statistics', [CreatorController::class, 'statistics'])->name('creator.statistics');
            Route::get('/dashboard/creator/reels', [CreatorController::class, 'reels'])->name('creator.reels');
            Route::get('/dashboard/creator/ratings', [CreatorController::class, 'ratings'])->name('creator.ratings');
            Route::post('/dashboard/creator/intro-video', [CreatorController::class, 'storeIntroVideo'])
                ->name('dashboard.creator.intro-video');
            Route::post('/dashboard/creator/support', [CreatorController::class, 'storeSupportMessage'])
                ->name('dashboard.creator.support');
            Route::post('/dashboard/creator/offer', [CreatorController::class, 'storeOffer'])
                ->name('dashboard.creator.offer');
            Route::post('/dashboard/creator/orders/{order}/status', [CreatorController::class, 'updateOrderStatus'])
                ->name('dashboard.creator.orders.status');
            Route::get('/dashboard/creator/balance', [BalanceController::class, 'creator'])->name('creator.balance');
            Route::post('/dashboard/creator/balance/withdraw', [BalanceController::class, 'withdraw'])->name('withdraw.balance');
            Route::post('/dashboard/creator/transactions/{transaction}/confirm', [BalanceController::class, 'confirm'])
                ->name('creator.transactions.confirm');
            Route::get('/dashboard/creator/video-points', [VideoController::class, 'points'])->name('creator.video.points');
            Route::post('/dashboard/creator/videos', [VideoController::class, 'store'])->name('creator.videos.store');
        });

        Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::get('/subscriptions', [AdminController::class, 'subscriptions'])->name('subscriptions');
            Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
            Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
            Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
            Route::get('/video-points', [AdminController::class, 'videoPoints'])->name('video.points');
            Route::post('/video-points', [AdminController::class, 'updateVideoPoints'])->name('video.points.update');
            Route::resource('cms-sections', CmsSectionController::class)->only(['index', 'edit', 'update']);
            Route::resource('plans', PlanController::class)->except(['show']);
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
