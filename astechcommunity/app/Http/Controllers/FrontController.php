<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Event;
use App\Instructor;
use App\Blog;

class FrontController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get featured/popular courses (limit to 8 for homepage)
        $popularCourses = Course::with(['instructor', 'category'])
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('total_students', 'desc')
            ->orderBy('rating', 'desc')
            ->limit(8)
            ->get();

        // If we don't have enough featured courses, get the most popular ones
        if ($popularCourses->count() < 8) {
            $popularCourses = Course::with(['instructor', 'category'])
                ->where('is_active', true)
                ->orderBy('total_students', 'desc')
                ->orderBy('rating', 'desc')
                ->limit(8)
                ->get();
        }

        // Get top categories with course counts
        $topCategories = Category::withCount('courses')
            ->where('is_active', true)
            ->orderBy('courses_count', 'desc')
            ->orderBy('sort_order')
            ->limit(7)
            ->get();

        // Get upcoming events (limit to 6 for homepage)
        $upcomingEvents = Event::upcoming()
            ->orderBy('event_date')
            ->limit(6)
            ->get();

        // Get top instructors by rating and student count
        $topInstructors = Instructor::where('is_active', true)
            ->orderBy('rating', 'desc')
            ->orderBy('total_students', 'desc')
            ->limit(5)
            ->get();

        // Get recent blog posts
        $recentBlogs = Blog::published()
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Calculate some stats for the hero section
        $totalCourses = Course::where('is_active', true)->count();
        $totalStudents = Course::where('is_active', true)->sum('total_students');
        $totalInstructors = Instructor::where('is_active', true)->count();

        return view('index', compact(
            'popularCourses', 
            'topCategories', 
            'upcomingEvents', 
            'topInstructors',
            'recentBlogs',
            'totalCourses',
            'totalStudents',
            'totalInstructors'
        ));
    }

    public function freelancers()
{
    return view('freelancers');
}

public function mentors()
{
    return view('mentors');
}

public function clients()
{
    return view('clients');
}

public function charity()
{
    return view('charity');
}

    /**
     * Show the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the courses page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function courses(Request $request)
    {
        $query = Course::with(['instructor', 'category'])
            ->where('is_active', true);

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Filter by level if provided
        if ($request->has('level') && $request->level) {
            $query->where('level', $request->level);
        }

        // Search by title if provided
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Sort courses
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'popular':
                $query->orderBy('total_students', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $courses = $query->paginate(12);

        // Get categories for filter dropdown
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $levels = ['Beginner', 'Intermediate', 'Advanced'];

        return view('courses', compact('courses', 'categories', 'levels'));
    }

    /**
     * Show individual course page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCourse(Course $course)
    {
        // Get related courses (same category, excluding current course)
        $relatedCourses = Course::with(['instructor', 'category'])
            ->where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('course-single', compact('course', 'relatedCourses'));
    }

    /**
     * Show the services page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function services()
    {
        return view('services');
    }

    /**
     * Show the events page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function events()
    {
        return view('events');
    }

    /**
     * Show the blog page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog()
    {
        return view('blog');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the membership plans page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function membershipPlans()
    {
        return view('membership-plans');
    }

    /**
     * Show the FAQs page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faqs()
    {
        return view('faqs');
    }

    /**
     * Show the shop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function shop()
    {
        return view('shop');
    }
}
