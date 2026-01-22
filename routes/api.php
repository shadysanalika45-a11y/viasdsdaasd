<?php

use App\Http\Controllers\Api\BalancePointsController;
use App\Http\Middleware\ApiTokenMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(ApiTokenMiddleware::class)->group(function () {
    Route::post('/balance', [BalancePointsController::class, 'updateBalance']);
    Route::post('/points', [BalancePointsController::class, 'updatePoints']);
    Route::post('/videos/{video}/rate', [BalancePointsController::class, 'rateVideo']);
});
