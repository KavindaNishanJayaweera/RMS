<?php
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Controllers\CompanyController;
use  Modules\Company\Http\Middleware\CompanyAuthenticated;
use Illuminate\Http\Request;
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
$router->aliasMiddleware('authCompany', CompanyAuthenticated::class);
Route::prefix('company')->group(function() {
    Route::get( '/logout', [CompanyController::class, 'logout']);
    Route::match(['get', 'post'],'/', [CompanyController::class, 'index']);
    Route::match(['get', 'post'],'/all-admins', [CompanyController::class, 'admins'])->middleware('authCompany');
    Route::match(['get', 'post'],'/dashboard', [CompanyController::class, 'dashboard'])->middleware('authCompany');
    Route::match(['get', 'post'],'/add-admin', [CompanyController::class, 'add_admin'])->middleware('authCompany');
    Route::match(['get', 'post'],'/edit-admin/{user_id}', [CompanyController::class, 'edit_admin'])->middleware('authCompany');
    Route::match(['get', 'post'],'/deactivate-admin/{user_id}', [CompanyController::class, 'deactivate_admin'])->middleware('authCompany');
    Route::match(['get', 'post'],'/activate-admin/{user_id}', [CompanyController::class, 'activate_admin'])->middleware('authCompany');
    Route::match(['get', 'post'],'/add-passenger', [CompanyController::class, 'add_passenger'])->middleware('authCompany');
    Route::match(['get', 'post'],'/all-passengers', [CompanyController::class, 'passengers'])->middleware('authCompany');
    Route::match(['get', 'post'],'/deactivate-passenger/{user_id}', [CompanyController::class, 'deactivate_passenger'])->middleware('authCompany');
    Route::match(['get', 'post'],'/activate-passenger/{user_id}', [CompanyController::class, 'activate_passenger'])->middleware('authCompany');
    Route::match(['get', 'post'],'/edit-passenger/{user_id}', [CompanyController::class, 'edit_passenger'])->middleware('authCompany');
    Route::match(['get', 'post'],'/add-train', [CompanyController::class, 'add_train'])->middleware('authCompany');
    Route::match(['get', 'post'],'/all-trains', [CompanyController::class, 'trains'])->middleware('authCompany');
    Route::match(['get', 'post'],'/edit-train/{id}', [CompanyController::class, 'edit_train'])->middleware('authCompany');
    Route::match(['get', 'post'],'/deactivate-train/{id}', [CompanyController::class, 'deactivate_train'])->middleware('authCompany');
    Route::match(['get', 'post'],'/activate-train/{id}', [CompanyController::class, 'activate_train'])->middleware('authCompany');
    Route::match(['get', 'post'],'/delete-train-stop/{id}', [CompanyController::class, 'delete_train_stop'])->middleware('authCompany');
    Route::match(['get', 'post'], '/booking-history', [CompanyController::class, 'booking_history'])->middleware('authCompany');
    Route::match(['get', 'post'], '/view-booking-details/{id}', [CompanyController::class, 'view_booking_details'])->middleware('authCompany');
    Route::match(['get', 'post'], '/download-passenger-list', [CompanyController::class, 'download_passenger_list'])->middleware('authCompany');
    Route::match(['get', 'post'],'/download-booking-list', [CompanyController::class, 'download_booking_list'])->middleware('authCompany');
});
