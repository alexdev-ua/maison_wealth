<?php

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

Route::get('/', 'IndexController@index')->name('home');

Route::get('/team', 'IndexController@team')->name('team');
Route::get('/contacts', 'IndexController@contacts')->name('contacts');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/gallery', 'ProjectsController@gallery')->name('gallery');

Route::get('/projects', 'ProjectsController@index')->name('projects');
Route::get('/projects/{name}', 'ProjectsController@profile');

Route::get('/projects/{name}/villas', 'ProjectsController@villas');

Route::get('/contact-form', 'OrderController@contactForm')->name('contact-form');

Route::post('/contact-form/save', 'OrderController@saveContactForm')->name('contact-form.save');

Route::get('/contact-form-success', 'OrderController@contactFormSuccess')->name('contact-form-success');

// Admin routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['guest:admin']], function () {
	Route::get('/login',  'Auth\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\AdminLoginController@login'        )->name('dashboard.login.submit');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin']], function () {
	Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');
  Route::get('/orders', 'Dashboard\OrderController@index')->name('dashboard.orders');

  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('dashboard.logout');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('dashboard.logout');
});
