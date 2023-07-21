<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminController;
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
Route::get('/terms', [IndexController::class, 'terms'])->name('terms');


Route::get('/contacts', [IndexController::class, 'contacts'])->name('contacts');

Route::post('/send-request', [IndexController::class, 'sendRequest'])->name('send-request');

// Admin routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['guest:admin']], function () {
	Route::get('/login',  [AdminLoginController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [AdminLoginController::class, 'login'])->name('dashboard.login.submit');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

	Route::post('/logout', [AdminLoginController::class, 'logout'])->name('dashboard.logout');
	Route::get('/logout', [AdminLoginController::class, 'logout'])->name('dashboard.logout');

	Route::get('/toggleSidebar', [DashboardController::class, 'toggleSidebar']);

	Route::post('/profile-save', [AdminController::class, 'saveProfile'])->name('dashboard.profile-save');

	Route::get('/{model}', [DashboardController::class, 'list']);
	Route::get('/{model}/{mode}', [DashboardController::class, 'formPage']);
	Route::get('/{model}/{mode}/form', [DashboardController::class, 'form']);
	Route::post('/{model}/save', [DashboardController::class, 'save']);
	Route::post('/{model}/delete', [DashboardController::class, 'delete']);

	Route::post('/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
});
