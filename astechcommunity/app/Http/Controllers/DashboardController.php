<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard pages
    public function dashboard() { return view('dashboard.dashboard'); }
    public function dshbDashboard() { return view('dashboard.dshb-dashboard'); }
    public function dshbCourses() { return view('dashboard.dshb-courses'); }
    public function dshbBookmarks() { return view('dashboard.dshb-bookmarks'); }
    public function dshbListing() { return view('dashboard.dshb-listing'); }
    public function dshbReviews() { return view('dashboard.dshb-reviews'); }
    public function dshbSettings() { return view('dashboard.dshb-settings'); }
    public function dshbAdministration() { return view('dashboard.dshb-administration'); }
    public function dshbAssignment() { return view('dashboard.dshb-assignment'); }
    public function dshbCalendar() { return view('dashboard.dshb-calendar'); }
    public function dshbDictionary() { return view('dashboard.dshb-dictionary'); }
    public function dshbForums() { return view('dashboard.dshb-forums'); }
    public function dshbGrades() { return view('dashboard.dshb-grades'); }
    public function dshbMessages() { return view('dashboard.dshb-messages'); }
    public function dshbParticipants() { return view('dashboard.dshb-participants'); }
    public function dshbQuiz() { return view('dashboard.dshb-quiz'); }
    public function dshbSurvey() { return view('dashboard.dshb-survey'); }
}
