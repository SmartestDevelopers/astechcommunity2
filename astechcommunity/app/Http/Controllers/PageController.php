<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Main pages
    public function home2() { return view('pages.home-2'); }
    public function home3() { return view('pages.home-3'); }
    public function home4() { return view('pages.home-4'); }
    public function home5() { return view('pages.home-5'); }
    public function home6() { return view('pages.home-6'); }
    public function home7() { return view('pages.home-7'); }
    public function home8() { return view('pages.home-8'); }
    public function home9() { return view('pages.home-9'); }
    public function home10() { return view('pages.home-10'); }

    // About pages
    public function about1() { return view('pages.about-1'); }
    public function about2() { return view('pages.about-2'); }

    // Contact pages
    public function contact1() { return view('pages.contact-1'); }
    public function contact2() { return view('pages.contact-2'); }

    // Blog pages
    public function blogList1() { return view('pages.blog-list-1'); }
    public function blogList2() { return view('pages.blog-list-2'); }
    public function blogList3() { return view('pages.blog-list-3'); }
    public function blogSingle() { return view('pages.blog-single'); }
    public function blogGrid() { return view('pages.blog-grid'); }
    public function blogArchive() { return view('pages.blog-archive'); }
    public function blogCategory() { return view('pages.blog-category'); }
    public function blogTag() { return view('pages.blog-tag'); }
    public function blogAuthor() { return view('pages.blog-author'); }

    // Instructor pages
    public function instructorBecome() { return view('pages.instructor-become'); }
    public function instructorsBecome() { return view('pages.instructors-become'); }
    public function instructorsList1() { return view('pages.instructors-list-1'); }
    public function instructorsList2() { return view('pages.instructors-list-2'); }
    public function instructorsSingle() { return view('pages.instructors-single'); }

    // Event pages
    public function eventList1() { return view('pages.event-list-1'); }
    public function eventList2() { return view('pages.event-list-2'); }
    public function eventSingle() { return view('pages.event-single'); }

    // Lesson pages
    public function lessonSingle1() { return view('pages.lesson-single-1'); }
    public function lessonSingle2() { return view('pages.lesson-single-2'); }

    // Authentication pages (will be handled by Laravel's auth system)
    public function loginPage() { return view('pages.login'); }
    public function signupPage() { return view('pages.signup'); }

    // Utility pages
    public function error404() { return view('pages.404'); }
    public function cover1() { return view('pages.cover-1'); }
    public function video1() { return view('pages.video-1'); }
    public function pricing() { return view('pages.pricing'); }
    public function terms() { return view('pages.terms'); }
    public function helpCenter() { return view('pages.help-center'); }
    public function uiElements() { return view('pages.ui-elements'); }

    // Shop pages
    public function shopList() { return view('pages.shop-list'); }
    public function shopSingle() { return view('pages.shop-single'); }
    public function shopCart() { return view('pages.shop-cart'); }
    public function shopCheckout() { return view('pages.shop-checkout'); }
    public function shopOrder() { return view('pages.shop-order'); }
}
