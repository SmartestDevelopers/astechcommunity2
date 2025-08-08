<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
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

    // Course list pages
    public function coursesList1() { return view('courses.courses-list-1'); }
    public function coursesList2() { return view('courses.courses-list-2'); }
    public function coursesList3() { return view('courses.courses-list-3'); }
    public function coursesList4() { return view('courses.courses-list-4'); }
    public function coursesList5() { return view('courses.courses-list-5'); }
    public function coursesList6() { return view('courses.courses-list-6'); }
    public function coursesList7() { return view('courses.courses-list-7'); }
    public function coursesList8() { return view('courses.courses-list-8'); }
    public function coursesList9() { return view('courses.courses-list-9'); }
    public function coursesListAll() { return view('courses.courses-list-all'); }

    // Course single pages
    public function coursesSingle1() { return view('courses.courses-single-1'); }
    public function coursesSingle2() { return view('courses.courses-single-2'); }
    public function coursesSingle3() { return view('courses.courses-single-3'); }
    public function coursesSingle4() { return view('courses.courses-single-4'); }
    public function coursesSingle5() { return view('courses.courses-single-5'); }
    public function coursesSingle6() { return view('courses.courses-single-6'); }
}
