<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesChartController;
use App\Http\Controllers\SalesManController;
use App\Http\Controllers\ServiceAdvisorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\VehicleColorController;
use App\Http\Controllers\VehicleDetailController;
Route::get('/',[DashboardController::class, 'Home']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class,'postLogin'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Dashboard untuk admin
Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])
    ->middleware('auth:admin')
    ->name('admin.dashboard');
Route::get('/customer-dashboard', [DashboardController::class, 'customerDashboard'])
    ->middleware('auth:web')
    ->name('customer.dashboard');
Route::get('/models',[DashboardController::class,'modelShow'])->name('models');
Route::get('/models/{id}',[DashboardController::class,'modelShow'])->name('models.show');
Route::get('/services',[DashboardController::class,'services'])->name('services');
Route::get('/promo',[DashboardController::class,'promo'])->name('promo');
// Route::resource('/dashboard/vehicles', VehicleController::class)->names('vehicle');
Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/vehicles', VehicleController::class)->names([
        'index' => 'vehicle.index',
        'create' => 'vehicle.create',
        'store' => 'vehicle.store',
        'show' => 'vehicle.show',
        'edit' => 'vehicle.edit',
        'update' => 'vehicle.update',
        'destroy' => 'vehicle.destroy'
    ]);
});


Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/payments', PaymentController::class)->names([
        'index' => 'payment.index',
        'create' => 'payment.create',
        'store' => 'payment.store',
        'show' => 'payment.show',
        'edit' => 'payment.edit',
        'update' => 'payment.update',
        'destroy' => 'payment.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/bookings', BookingController::class)->names([
        'index' => 'booking.index',
        'create' => 'booking.create',
        'store' => 'booking.store',
        'show' => 'booking.show',
        'edit' => 'booking.edit',
        'update' => 'booking.update',
        'destroy' => 'booking.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/customers', CustomerController::class)->names([
        'index' => 'customer.index',
        'create' => 'customer.create',
        'store' => 'customer.store',
        'show' => 'customer.show',
        'edit' => 'customer.edit',
        'update' => 'customer.update',
        'destroy' => 'customer.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/sales', SalesController::class)->names([
        'index' => 'sales.index',
        'create' => 'sales.create',
        'store' => 'sales.store',
        'show' => 'sales.show',
        'edit' => 'sales.edit',
        'update' => 'sales.update',
        'destroy' => 'sales.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/service-advisors', ServiceAdvisorController::class)->names([
        'index' => 'serviceAdvisor.index',
        'create' => 'serviceAdvisor.create',
        'store' => 'serviceAdvisor.store',
        'show' => 'serviceAdvisor.show',
        'edit' => 'serviceAdvisor.edit',
        'update' => 'serviceAdvisor.update',
        'destroy' => 'serviceAdvisor.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/admin', AdminController::class)->names([
        'index' => 'admin.index',
        'create' => 'admin.create',
        'store' => 'admin.store',
        'show' => 'admin.show',
        'edit' => 'admin.edit',
        'update' => 'admin.update',
        'destroy' => 'admin.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/vehicle-color', VehicleColorController::class)->names([
        'index' => 'vehicleColor.index',
        'create' => 'vehicleColor.create',
        'store' => 'vehicleColor.store',
        'show' => 'vehicleColor.show',
        'edit' => 'vehicleColor.edit',
        'update' => 'vehicleColor.update',
        'destroy' => 'vehicleColor.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/vehicle-detail', VehicleDetailController::class)->names([
        'index' => 'vehicleDetail.index',
        'create' => 'vehicleDetail.create',
        'store' => 'vehicleDetail.store',
        'show' => 'vehicleDetail.show',
        'edit' => 'vehicleDetail.edit',
        'update' => 'vehicleDetail.update',
        'destroy' => 'vehicleDetail.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/vehicle-type', VehicleTypeController::class)->names([
        'index' => 'vehicleType.index',
        'create' => 'vehicleType.create',
        'store' => 'vehicleType.store',
        'show' => 'vehicleType.show',
        'edit' => 'vehicleType.edit',
        'update' => 'vehicleType.update',
        'destroy' => 'vehicleType.destroy'
    ]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/color', ColorController::class)->names([
        'index' => 'color.index',
        'create' => 'color.create',
        'store' => 'color.store',
        'show' => 'color.show',
        'edit' => 'color.edit',
        'update' => 'color.update',
        'destroy' => 'color.destroy'
    ]);
});
Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/promo-code', PromoCodeController::class)->names([
        'index' => 'promoCode.index',
        'create' => 'promoCode.create',
        'store' => 'promoCode.store',
        'show' => 'promoCode.show',
        'edit' => 'promoCode.edit',
        'update' => 'promoCode.update',
        'destroy' => 'promoCode.destroy'
    ]);
});


Route::middleware(['auth:admin'])->group(function () {
    Route::resource('/dashboard/discount', DiscountController::class)->names([
        'index' => 'discount.index',
        'create' => 'discount.create',
        'store' => 'discount.store',
        'show' => 'discount.show',
        'edit' => 'discount.edit',
        'update' => 'discount.update',
        'destroy' => 'discount.destroy'
    ]);
});

Route::post('/colors', [ColorController::class, 'storeJson'])->name('colors.store');
Route::post('/vehicle-types', [VehicleTypeController::class, 'storeJson'])->name('vehicle-types.store');
Route::post('/bookings', [BookingController::class, 'store'])->name('vehicle-types.store');





Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::get('/profil', [ProfilController::class, 'index'])->name('customer.profil')->middleware('auth');
Route::get('/purchase-order', [ProfilController::class, 'purchaseOrder'])->name('order.purchase')->middleware('auth');
Route::get('/purchase-order/{status}', [ProfilController::class, 'purchaseOrder'])->name('order.purchase.status')->middleware('auth');
Route::get('/service-booking', [ProfilController::class, 'serviceBooking'])->name('service.booking')->middleware('auth');
Route::get('/feedback', [ProfilController::class, 'feedback'])->name('feedback.suggestion')->middleware('auth');





