<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontController@index');
Route::get('/courses', 'FrontController@courses');
Route::get('/courses/{course:slug}', 'FrontController@showCourse')->name('courses.show');
Route::get('/about', 'FrontController@about');
Route::get('/services', 'FrontController@services');
Route::get('/events', 'FrontController@events');
Route::get('/blog', 'FrontController@blog');
Route::get('/contact', 'FrontController@contact');
Route::get('/membership-plans', 'FrontController@membershipPlans');
Route::get('/faqs', 'FrontController@faqs');
Route::get('/shop', 'FrontController@shop');
