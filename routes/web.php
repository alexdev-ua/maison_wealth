<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/team', [IndexController::class, 'team'])->name('team');
Route::get('/contacts', [IndexController::class, 'contacts'])->name('contacts');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/gallery', [ProjectsController::class, 'gallery'])->name('gallery');

Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{name}', [ProjectsController::class, 'profile']);

Route::get('/projects/{name}/villas', [ProjectsController::class, 'villas']);

Route::get('/contact-form', [OrderController::class, 'contactForm'])->name('contact-form');

Route::post('/contact-form/save', [OrderController::class, 'saveContactForm'])->name('contact-form.save');

Route::get('/contact-form-success', [OrderController::class, 'contactFormSuccess'])->name('contact-form-success');

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
