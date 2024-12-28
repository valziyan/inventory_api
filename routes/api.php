<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\InventoryController;
use App\Http\Controllers\Api\V1\SubscriptionController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ProductItemController;
use App\Http\Controllers\Api\V1\LogController;

Route::prefix('v1')->group(function () {
    // Public routes
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        // Log Out user
        Route::post('/logout', [UserController::class, 'logout']);

        // Role management
        Route::apiResource('roles', RoleController::class);

        // User management
        Route::apiResource('users', UserController::class);

        // Inventory management
        Route::apiResource('inventories', InventoryController::class);

        // Subscription management
        Route::apiResource('subscriptions', SubscriptionController::class);

        // Transaction management
        Route::apiResource('transactions', TransactionController::class);

        // Product management
        Route::apiResource('products', ProductController::class);

        // Product-item management
        Route::apiResource('product-items', ProductItemController::class);

        // Logs
        Route::apiResource('logs', LogController::class);
    });
});
