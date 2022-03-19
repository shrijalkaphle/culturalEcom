<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

Route::get('/',[PageController::class, 'landingPage'])->name('landing');
Route::get('register', [PageController::class, 'registerPage'])->name('page.register');
Route::get('login', [PageController::class, 'loginPage'])->name('login');

Route::get('contact', [PageController::class, 'contactPage'])->name('contact');

Route::get('category/{name}', [PageController::class, 'categoryProductPage'])->name('category');

Route::post('create_user', [AuthController::class, 'createUser'])->name('user.register');
Route::post('check_user', [AuthController::class, 'checkUser'])->name('user.login');

Route::get('product/{slug}', [PageController::class, 'viewSingleProduct'])->name('view.product');

Route::group(['middleware' => 'auth'], function() {
    Route::get('user/profile', [UserController::class, 'viewProfile'])->name('user.profile');
    Route::get('user/change-password', [UserController::class, 'changePassword'])->name('user.changepassword');
    Route::post('user/update-password', [UserController::class, 'updatePasword'])->name('user.updatepasword');
    Route::get('user/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('user/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('cart', [CartController::class, 'viewCart'])->name('cart');
    Route::post('add_to_cart', [CartController::class, 'addToCart'])->name('cart.insert');
    Route::patch('update_cart/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('cart/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');

    Route::get('user/order', [OrderController::class, 'viewOrder'])->name('user.order');
    Route::post('payment', [CartController::class, 'paymentPage'])->name('payment');
    Route::post('payment/complete', [CartController::class, 'confirmedPayment'])->name('payment.complete');

    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/change-password', [PageController::class, 'adminChangePassword'])->name('admin.changepassword');

    Route::resources([
        'categories'    =>  admin\CategoryController::class,
        'products'      =>  admin\ProductController::class,
        'sliders'       =>  admin\SliderController::class,
    ]);

    Route::group(['prefix' => 'user'], function() {
        Route::resources([
            'admin'         =>  admin\AdminController::class,
            'customer'      =>  admin\CustomerController::class,
        ]);
    });

    Route::get('order/list', [OrderController::class, 'viewAllOrder'])->name('order');
});
