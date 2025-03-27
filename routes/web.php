<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home')->middleware(['auth']);

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('salons', SalonController::class)->middleware('role:admin,salon_owner');
    Route::resource('services', ServiceController::class)->middleware('role:admin,salon_owner');
    Route::resource('appointments', AppointmentController::class)->middleware('role:admin,salon_owner,customer');
    Route::resource('payments', PaymentController::class)->middleware('role:admin,salon_owner');
    Route::resource('reviews', ReviewController::class)->middleware('role:admin,salon_owner,customer');
    Route::resource('products', ProductController::class)->middleware('role:admin,salon_owner');
    Route::resource('categories', CategoryController::class)->middleware('role:admin,salon_owner');
    Route::resource('inventories', InventoryController::class)->middleware('role:admin,salon_owner');
    Route::resource('reports', ReportController::class)->middleware('role:admin,salon_owner');
});

Route::middleware(['auth', 'role:admin,salon_owner,customer'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
