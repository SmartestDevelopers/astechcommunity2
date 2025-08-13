<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| This file contains all admin panel routes for CRUD operations.
| These routes are protected and should require authentication/authorization.
|
*/

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Courses CRUD Routes
Route::prefix('admin/courses')->name('admin.courses.')->group(function () {
    Route::get('/', [AdminController::class, 'coursesIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'coursesCreate'])->name('create');
    Route::post('/', [AdminController::class, 'coursesStore'])->name('store');
    Route::get('/{course}', [AdminController::class, 'coursesShow'])->name('show');
    Route::get('/{course}/edit', [AdminController::class, 'coursesEdit'])->name('edit');
    Route::put('/{course}', [AdminController::class, 'coursesUpdate'])->name('update');
    Route::delete('/{course}', [AdminController::class, 'coursesDestroy'])->name('destroy');
});

// Services CRUD Routes
Route::prefix('admin/services')->name('admin.services.')->group(function () {
    Route::get('/', [AdminController::class, 'servicesIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'servicesCreate'])->name('create');
    Route::post('/', [AdminController::class, 'servicesStore'])->name('store');
    Route::get('/{service}', [AdminController::class, 'servicesShow'])->name('show');
    Route::get('/{service}/edit', [AdminController::class, 'servicesEdit'])->name('edit');
    Route::put('/{service}', [AdminController::class, 'servicesUpdate'])->name('update');
    Route::delete('/{service}', [AdminController::class, 'servicesDestroy'])->name('destroy');
});

// Blog CRUD Routes
Route::prefix('admin/blog')->name('admin.blog.')->group(function () {
    Route::get('/', [AdminController::class, 'blogIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'blogCreate'])->name('create');
    Route::post('/', [AdminController::class, 'blogStore'])->name('store');
    Route::get('/{post}', [AdminController::class, 'blogShow'])->name('show');
    Route::get('/{post}/edit', [AdminController::class, 'blogEdit'])->name('edit');
    Route::put('/{post}', [AdminController::class, 'blogUpdate'])->name('update');
    Route::delete('/{post}', [AdminController::class, 'blogDestroy'])->name('destroy');
});

// FAQs CRUD Routes
Route::prefix('admin/faqs')->name('admin.faqs.')->group(function () {
    Route::get('/', [AdminController::class, 'faqsIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'faqsCreate'])->name('create');
    Route::post('/', [AdminController::class, 'faqsStore'])->name('store');
    Route::get('/{faq}', [AdminController::class, 'faqsShow'])->name('show');
    Route::get('/{faq}/edit', [AdminController::class, 'faqsEdit'])->name('edit');
    Route::put('/{faq}', [AdminController::class, 'faqsUpdate'])->name('update');
    Route::delete('/{faq}', [AdminController::class, 'faqsDestroy'])->name('destroy');
});

// Membership Plans CRUD Routes
Route::prefix('admin/membership')->name('admin.membership.')->group(function () {
    Route::get('/', [AdminController::class, 'membershipIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'membershipCreate'])->name('create');
    Route::post('/', [AdminController::class, 'membershipStore'])->name('store');
    Route::get('/{plan}', [AdminController::class, 'membershipShow'])->name('show');
    Route::get('/{plan}/edit', [AdminController::class, 'membershipEdit'])->name('edit');
    Route::put('/{plan}', [AdminController::class, 'membershipUpdate'])->name('update');
    Route::delete('/{plan}', [AdminController::class, 'membershipDestroy'])->name('destroy');
});

// Freelancers CRUD Routes
Route::prefix('admin/freelancers')->name('admin.freelancers.')->group(function () {
    Route::get('/', [AdminController::class, 'freelancersIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'freelancersCreate'])->name('create');
    Route::post('/', [AdminController::class, 'freelancersStore'])->name('store');
    Route::get('/{freelancer}', [AdminController::class, 'freelancersShow'])->name('show');
    Route::get('/{freelancer}/edit', [AdminController::class, 'freelancersEdit'])->name('edit');
    Route::put('/{freelancer}', [AdminController::class, 'freelancersUpdate'])->name('update');
    Route::delete('/{freelancer}', [AdminController::class, 'freelancersDestroy'])->name('destroy');
});

// Mentors CRUD Routes
Route::prefix('admin/mentors')->name('admin.mentors.')->group(function () {
    Route::get('/', [AdminController::class, 'mentorsIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'mentorsCreate'])->name('create');
    Route::post('/', [AdminController::class, 'mentorsStore'])->name('store');
    Route::get('/{mentor}', [AdminController::class, 'mentorsShow'])->name('show');
    Route::get('/{mentor}/edit', [AdminController::class, 'mentorsEdit'])->name('edit');
    Route::put('/{mentor}', [AdminController::class, 'mentorsUpdate'])->name('update');
    Route::delete('/{mentor}', [AdminController::class, 'mentorsDestroy'])->name('destroy');
});

// Clients CRUD Routes
Route::prefix('admin/clients')->name('admin.clients.')->group(function () {
    Route::get('/', [AdminController::class, 'clientsIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'clientsCreate'])->name('create');
    Route::post('/', [AdminController::class, 'clientsStore'])->name('store');
    Route::get('/{client}', [AdminController::class, 'clientsShow'])->name('show');
    Route::get('/{client}/edit', [AdminController::class, 'clientsEdit'])->name('edit');
    Route::put('/{client}', [AdminController::class, 'clientsUpdate'])->name('update');
    Route::delete('/{client}', [AdminController::class, 'clientsDestroy'])->name('destroy');
});

// Charity Programs CRUD Routes
Route::prefix('admin/charity')->name('admin.charity.')->group(function () {
    Route::get('/', [AdminController::class, 'charityIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'charityCreate'])->name('create');
    Route::post('/', [AdminController::class, 'charityStore'])->name('store');
    Route::get('/{program}', [AdminController::class, 'charityShow'])->name('show');
    Route::get('/{program}/edit', [AdminController::class, 'charityEdit'])->name('edit');
    Route::put('/{program}', [AdminController::class, 'charityUpdate'])->name('update');
    Route::delete('/{program}', [AdminController::class, 'charityDestroy'])->name('destroy');
});

// SEO Pages CRUD Routes
Route::prefix('admin/seo')->name('admin.seo.')->group(function () {
    Route::get('/', [AdminController::class, 'seoIndex'])->name('index');
    Route::get('/create', [AdminController::class, 'seoCreate'])->name('create');
    Route::post('/', [AdminController::class, 'seoStore'])->name('store');
    Route::get('/{seoPage}', [AdminController::class, 'seoShow'])->name('show');
    Route::get('/{seoPage}/edit', [AdminController::class, 'seoEdit'])->name('edit');
    Route::put('/{seoPage}', [AdminController::class, 'seoUpdate'])->name('update');
    Route::delete('/{seoPage}', [AdminController::class, 'seoDestroy'])->name('destroy');
});
