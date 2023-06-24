<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderController as DashboardOrderController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/properties', [IndexController::class, 'properties'])->name('properties');
Route::get('/properties/{location}', [IndexController::class, 'properties']);

Route::get('/property/{property}', [IndexController::class, 'propertyView']);

Route::get('/countries', [IndexController::class, 'country'])->name('countries');

Route::get('/direction/{direction}', [IndexController::class, 'directionView']);

Route::get('/about', [IndexController::class, 'about'])->name('about');

Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog/{article}', [IndexController::class, 'articleView']);

Route::get('/cookies', [IndexController::class, 'cookies']);


Route::get('/contacts', [IndexController::class, 'contacts'])->name('contacts');

Route::post('/send-request', [IndexController::class, 'sendRequest'])->name('send-request');

// Admin routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['guest:admin']], function () {
	Route::get('/login',  [AdminLoginController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [AdminLoginController::class, 'login'])->name('dashboard.login.submit');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/orders', [DashboardOrderController::class, 'index'])->name('dashboard.orders');

  Route::post('/logout', [AdminLoginController::class, 'logout'])->name('dashboard.logout');
	Route::get('/logout', [AdminLoginController::class, 'logout'])->name('dashboard.logout');
});
