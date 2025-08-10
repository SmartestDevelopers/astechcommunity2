<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Event;
use App\Instructor;
use App\Blog;
use App\Service;
use App\Freelancer;

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

        // Featured services for homepage
        $homeServices = Service::active()->featured()
            ->orderBy('sort_order')
            ->limit(8)
            ->get();
        if ($homeServices->count() < 8) {
            $homeServices = Service::active()->orderByDesc('created_at')->limit(8)->get();
        }

        // Featured freelancers for homepage
        $homeFreelancers = Freelancer::where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('rating')
            ->limit(8)
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
            'homeServices',
            'homeFreelancers',
            'recentBlogs',
            'totalCourses',
            'totalStudents',
            'totalInstructors'
        ));
    }

    public function freelancers(Request $request)
    {
        $query = \App\Freelancer::query()->where('is_active', true);

        if ($search = $request->get('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('bio', 'like', "%{$search}%");
            });
        }

        if ($location = $request->get('location')) {
            $query->where('location', $location);
        }

        $freelancers = $query->orderByDesc('is_featured')
            ->orderByDesc('rating')
            ->paginate(12);

        $locations = \App\Freelancer::query()
            ->select('location')
            ->whereNotNull('location')
            ->distinct()
            ->pluck('location');

        return view('freelancers', compact('freelancers', 'locations'));
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

    public function showFreelancer(\App\Freelancer $freelancer)
    {
        return view('freelancer-single', compact('freelancer'));
    }

    /**
     * Show courses by category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function coursesByCategory($category)
    {
        // Find category by slug or name
        $categoryModel = Category::where('slug', $category)
            ->orWhere('name', $category)
            ->first();
            
        if (!$categoryModel) {
            return redirect()->route('courses')->with('error', 'Category not found.');
        }

        $courses = Course::with(['instructor', 'category'])
            ->where('category_id', $categoryModel->id)
            ->where('is_active', true)
            ->orderBy('total_students', 'desc')
            ->orderBy('rating', 'desc')
            ->paginate(12);

        // Get all categories for filter dropdown
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $levels = ['Beginner', 'Intermediate', 'Advanced'];

        return view('courses', compact('courses', 'categories', 'levels', 'categoryModel'));
    }

    /**
     * Show the services page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function services(Request $request)
    {
        $servicesQuery = \App\Service::active()->orderByDesc('is_featured')->orderBy('sort_order');
        if ($search = $request->get('search')) {
            $servicesQuery->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }
        $services = $servicesQuery->paginate(12);
        return view('services', compact('services'));
    }

    public function showService(\App\Service $service)
    {
        return view('service-single', compact('service'));
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
     * Search courses for autocomplete
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchCourses(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $courses = Course::with(['instructor', 'category'])
            ->where('is_active', true)
            ->where(function($q) use ($query) {
                $q->where('title', 'LIKE', '%' . $query . '%')
                  ->orWhere('description', 'LIKE', '%' . $query . '%')
                  ->orWhere('short_description', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('total_students', 'desc')
            ->orderBy('rating', 'desc')
            ->limit(10)
            ->get()
            ->map(function($course) {
                return [
                    'id' => $course->id,
                    'title' => $course->title,
                    'slug' => $course->slug,
                    'short_description' => $course->short_description,
                    'image' => $course->image,
                    'price' => $course->price,
                    'discount_price' => $course->discount_price,
                    'rating' => $course->rating,
                    'total_students' => $course->total_students,
                    'instructor' => $course->instructor ? $course->instructor->name : 'Unknown',
                    'category' => $course->category ? $course->category->name : 'Uncategorized',
                    'url' => route('courses.show', $course->slug)
                ];
            });
            
        return response()->json($courses);
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
