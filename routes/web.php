<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Http\Middleware\AuthCustomer;

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

$router->aliasMiddleware('authCustomer', AuthCustomer::class);

Route::match(['get', 'post'], '/', [MainController::class, 'home']);
Route::match(['get', 'post'], 'login', [MainController::class, 'index']);
Route::match(['get', 'post'], 'logout', [MainController::class, 'logout']);
Route::match(['get', 'post'], 'register', [MainController::class, 'register']);
Route::match(['get', 'post'], 'dashboard', [MainController::class, 'dashboard']);
Route::match(['get', 'post'], 'forgot-password', [MainController::class, 'forgot_password']);
Route::match(['get', 'post'], 'reset-password/{id}/{link}', [MainController::class, 'reset_password']);
Route::match(['get', 'post'], 'profile', [MainController::class, 'profile'])->middleware('authCustomer');
Route::match(['get', 'post'], 'change-password/{id}', [MainController::class, 'change_password'])->middleware('authCustomer');
Route::match(['get', 'post'], 'book-trains', [MainController::class, 'book_trains'])->middleware('authCustomer');
Route::match(['get', 'post'], 'book-train/{id}', [MainController::class, 'book_train'])->middleware('authCustomer');
Route::match(['get', 'post'],'get-price', [MainController::class, 'get_price'])->middleware('authCustomer');
Route::match(['get', 'post'], 'my-bookings', [MainController::class, 'my_bookings'])->middleware('authCustomer');
Route::match(['get', 'post'], 'view-booking-details/{id}', [MainController::class, 'view_booking_details'])->middleware('authCustomer');
Route::match(['get', 'post'], 'cancel-booking/{id}', [MainController::class, 'cancel_booking'])->middleware('authCustomer');
Route::match(['get', 'post'],'confirm-email/{id}', [MainController::class, 'confirm_email']);

Route::match(['get', 'post'],'checkout-return', [MainController::class, 'checkout_return']);
Route::match(['get', 'post'],'checkout-cancel', [MainController::class, 'checkout_cancel']);
