<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SalonController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReviewController;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\ReportController;

use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('/user/profile', [UserProfileController::class, 'index']);
    Route::post('/user/profile/update', [UserProfileController::class, 'update']);

    Route::get('salons', [SalonController::class, 'index']);
    Route::get('salons/{id}', [SalonController::class, 'show']);

    Route::get('services/{salon_id}', [ServiceController::class, 'index']);

    Route::post('appointments', [AppointmentController::class, 'store']);
    Route::get('appointments', [AppointmentController::class, 'userAppointments']);

    Route::post('payments', [PaymentController::class, 'store']);

    Route::post('reviews', [ReviewController::class, 'store']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);

    Route::get('inventory', [InventoryController::class, 'index']);
    Route::post('inventory/add', [InventoryController::class, 'store']);

    Route::get('report/sales', [ReportController::class, 'salesReport']);
    Route::get('report/services', [ReportController::class, 'serviceReport']);
    Route::get('report/accounting', [ReportController::class, 'accountingReport']);

});
