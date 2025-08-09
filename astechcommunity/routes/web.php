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
Route::get('/courses', 'FrontController@courses')->name('courses');

// Course Controller Routes - MOVED BEFORE wildcard route to avoid conflicts
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/list-1', 'CourseController@coursesList1')->name('list-1');
    Route::get('/list-2', 'CourseController@coursesList2')->name('list-2');
    Route::get('/list-3', 'CourseController@coursesList3')->name('list-3');
    Route::get('/list-4', 'CourseController@coursesList4')->name('list-4');
    Route::get('/list-5', 'CourseController@coursesList5')->name('list-5');
    Route::get('/list-6', 'CourseController@coursesList6')->name('list-6');
    Route::get('/list-7', 'CourseController@coursesList7')->name('list-7');
    Route::get('/list-8', 'CourseController@coursesList8')->name('list-8');
    Route::get('/list-9', 'CourseController@coursesList9')->name('list-9');
    Route::get('/list-all', 'CourseController@coursesListAll')->name('list-all');
    
    Route::get('/single-1', 'CourseController@coursesSingle1')->name('single-1');
    Route::get('/single-2', 'CourseController@coursesSingle2')->name('single-2');
    Route::get('/single-3', 'CourseController@coursesSingle3')->name('single-3');
    Route::get('/single-4', 'CourseController@coursesSingle4')->name('single-4');
    Route::get('/single-5', 'CourseController@coursesSingle5')->name('single-5');
    Route::get('/single-6', 'CourseController@coursesSingle6')->name('single-6');
});

// This wildcard route MUST come after the specific course routes above
Route::get('/courses/{course:slug}', 'FrontController@showCourse')->name('courses.show');

Route::get('/about', 'FrontController@about');
Route::get('/services', 'FrontController@services');
Route::get('/events', 'FrontController@events');
Route::get('/blog', 'FrontController@blog');
Route::get('/contact', 'FrontController@contact');
Route::get('/membership-plans', 'FrontController@membershipPlans');
Route::get('/faqs', 'FrontController@faqs');
Route::get('/shop', 'FrontController@shop');

// New routes for the four tabs
Route::get('/freelancers', 'FrontController@freelancers')->name('freelancers');
Route::get('/mentors', 'FrontController@mentors')->name('mentors');
Route::get('/clients', 'FrontController@clients')->name('clients');
Route::get('/charity', 'FrontController@charity')->name('charity');

// Page Controller Routes
Route::prefix('pages')->name('pages.')->group(function () {
    Route::get('/home-2', 'PageController@home2')->name('home-2');
    Route::get('/home-3', 'PageController@home3')->name('home-3');
    Route::get('/home-4', 'PageController@home4')->name('home-4');
    Route::get('/home-5', 'PageController@home5')->name('home-5');
    Route::get('/home-6', 'PageController@home6')->name('home-6');
    Route::get('/home-7', 'PageController@home7')->name('home-7');
    Route::get('/home-8', 'PageController@home8')->name('home-8');
    Route::get('/home-9', 'PageController@home9')->name('home-9');
    Route::get('/home-10', 'PageController@home10')->name('home-10');
    
    Route::get('/about-1', 'PageController@about1')->name('about-1');
    Route::get('/about-2', 'PageController@about2')->name('about-2');
    
    Route::get('/contact-1', 'PageController@contact1')->name('contact-1');
    Route::get('/contact-2', 'PageController@contact2')->name('contact-2');
    
    Route::get('/blog-list-1', 'PageController@blogList1')->name('blog-list-1');
    Route::get('/blog-list-2', 'PageController@blogList2')->name('blog-list-2');
    Route::get('/blog-list-3', 'PageController@blogList3')->name('blog-list-3');
    Route::get('/blog-single', 'PageController@blogSingle')->name('blog-single');
    Route::get('/blog-grid', 'PageController@blogGrid')->name('blog-grid');
    Route::get('/blog-archive', 'PageController@blogArchive')->name('blog-archive');
    Route::get('/blog-category', 'PageController@blogCategory')->name('blog-category');
    Route::get('/blog-tag', 'PageController@blogTag')->name('blog-tag');
    Route::get('/blog-author', 'PageController@blogAuthor')->name('blog-author');
    
    Route::get('/instructors-list-1', 'PageController@instructorsList1')->name('instructors-list-1');
    Route::get('/instructors-list-2', 'PageController@instructorsList2')->name('instructors-list-2');
    Route::get('/instructors-single', 'PageController@instructorsSingle')->name('instructors-single');
    Route::get('/instructor-become', 'PageController@instructorBecome')->name('instructor-become');
    Route::get('/instructors-become', 'PageController@instructorsBecome')->name('instructors-become');
    
    Route::get('/event-list-1', 'PageController@eventList1')->name('event-list-1');
    Route::get('/event-list-2', 'PageController@eventList2')->name('event-list-2');
    Route::get('/event-single', 'PageController@eventSingle')->name('event-single');
    
    Route::get('/lesson-single-1', 'PageController@lessonSingle1')->name('lesson-single-1');
    Route::get('/lesson-single-2', 'PageController@lessonSingle2')->name('lesson-single-2');
    
    Route::get('/login-page', 'PageController@loginPage')->name('login-page');
    Route::get('/signup-page', 'PageController@signupPage')->name('signup-page');
    
    Route::get('/404', 'PageController@error404')->name('404');
    Route::get('/cover-1', 'PageController@cover1')->name('cover-1');
    Route::get('/video-1', 'PageController@video1')->name('video-1');
    Route::get('/pricing', 'PageController@pricing')->name('pricing');
    Route::get('/terms', 'PageController@terms')->name('terms');
    Route::get('/help-center', 'PageController@helpCenter')->name('help-center');
    Route::get('/ui-elements', 'PageController@uiElements')->name('ui-elements');
    
    Route::get('/shop-list', 'PageController@shopList')->name('shop-list');
    Route::get('/shop-single', 'PageController@shopSingle')->name('shop-single');
    Route::get('/shop-cart', 'PageController@shopCart')->name('shop-cart');
    Route::get('/shop-checkout', 'PageController@shopCheckout')->name('shop-checkout');
    Route::get('/shop-order', 'PageController@shopOrder')->name('shop-order');
});


// Dashboard Routes (protected by auth middleware)
Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'DashboardController@dashboard')->name('index');
    Route::get('/main', 'DashboardController@dshbDashboard')->name('main');
    Route::get('/courses', 'DashboardController@dshbCourses')->name('courses');
    Route::get('/bookmarks', 'DashboardController@dshbBookmarks')->name('bookmarks');
    Route::get('/listing', 'DashboardController@dshbListing')->name('listing');
    Route::get('/reviews', 'DashboardController@dshbReviews')->name('reviews');
    Route::get('/settings', 'DashboardController@dshbSettings')->name('settings');
    Route::get('/administration', 'DashboardController@dshbAdministration')->name('administration');
    Route::get('/assignment', 'DashboardController@dshbAssignment')->name('assignment');
    Route::get('/calendar', 'DashboardController@dshbCalendar')->name('calendar');
    Route::get('/dictionary', 'DashboardController@dshbDictionary')->name('dictionary');
    Route::get('/forums', 'DashboardController@dshbForums')->name('forums');
    Route::get('/grades', 'DashboardController@dshbGrades')->name('grades');
    Route::get('/messages', 'DashboardController@dshbMessages')->name('messages');
    Route::get('/participants', 'DashboardController@dshbParticipants')->name('participants');
    Route::get('/quiz', 'DashboardController@dshbQuiz')->name('quiz');
    Route::get('/survey', 'DashboardController@dshbSurvey')->name('survey');
});

// Include Admin Routes (protected by auth middleware - consider adding admin middleware)
Route::middleware('auth')->group(function () {
    require __DIR__.'/admin.php';
});
