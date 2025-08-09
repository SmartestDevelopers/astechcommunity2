<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Instructor;
use App\Lesson;
use App\CourseReview;

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

    // Course list pages with dynamic data
    public function coursesList1() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->latest()
                        ->paginate(12);
        $categories = Category::all();
        $instructors = Instructor::where('is_active', true)->get();
        
        $seoData = [
            'title' => 'Premium Online Courses - Learn from Industry Experts | ' . config('app.name'),
            'description' => 'Discover high-quality online courses taught by industry professionals. Learn web development, programming, design, marketing and more with hands-on projects.',
            'keywords' => 'online courses, web development, programming, design, marketing, learning, education, skills'
        ];
        
        return view('courses.courses-list-1', compact('courses', 'categories', 'instructors', 'seoData'));
    }
    
    public function coursesList2() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->where('is_featured', true)
                        ->latest()
                        ->paginate(9);
        $categories = Category::all();
        $instructors = Instructor::where('is_active', true)->get();
        
        $seoData = [
            'title' => 'Featured Online Courses - Top-Rated Learning Programs | ' . config('app.name'),
            'description' => 'Explore our featured collection of top-rated online courses. Master new skills with comprehensive learning programs designed by industry experts.',
            'keywords' => 'featured courses, top-rated courses, online learning, professional development, skill building'
        ];
        
        return view('courses.courses-list-2', compact('courses', 'categories', 'instructors', 'seoData'));
    }
    
    public function coursesList3() {
        $courses = Course::with(['instructor', 'category', 'reviews'])
                        ->where('is_active', true)
                        ->orderBy('rating', 'desc')
                        ->paginate(8);
        $categories = Category::all();
        $instructors = Instructor::where('is_active', true)->get();
        $popularCourses = Course::where('total_students', '>', 100)->take(6)->get();
        
        $seoData = [
            'title' => 'Best Online Courses - Highest Rated Learning Programs | ' . config('app.name'),
            'description' => 'Browse the best online courses with highest ratings and student satisfaction. Learn from verified instructors with proven track records.',
            'keywords' => 'best courses, highest rated, student reviews, quality education, verified instructors'
        ];
        
        return view('courses.courses-list-3', compact('courses', 'categories', 'instructors', 'popularCourses', 'seoData'));
    }
    
    public function coursesList4() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->where('level', 'Beginner')
                        ->latest()
                        ->paginate(10);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Beginner-Friendly Online Courses - Start Your Learning Journey | ' . config('app.name'),
            'description' => 'Perfect courses for beginners. Start your learning journey with step-by-step guidance from experienced instructors.',
            'keywords' => 'beginner courses, learn from scratch, easy learning, step-by-step, basic skills'
        ];
        
        return view('courses.courses-list-4', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesList5() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->where('price', '>', 0)
                        ->orderBy('discount_price', 'desc')
                        ->paginate(12);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Premium Courses with Great Discounts - Best Value Learning | ' . config('app.name'),
            'description' => 'Get premium quality courses at discounted prices. Limited time offers on professional development programs.',
            'keywords' => 'discount courses, premium learning, best value, limited offers, professional courses'
        ];
        
        return view('courses.courses-list-5', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesList6() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->orderBy('total_students', 'desc')
                        ->paginate(15);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Most Popular Online Courses - Join Thousands of Students | ' . config('app.name'),
            'description' => 'Join our most popular courses with thousands of satisfied students. Proven learning paths for career advancement.',
            'keywords' => 'popular courses, most enrolled, trending, career advancement, student success'
        ];
        
        return view('courses.courses-list-6', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesList7() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->whereNotNull('video_url')
                        ->latest()
                        ->paginate(9);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Video-Based Online Courses - Interactive Learning Experience | ' . config('app.name'),
            'description' => 'Learn through high-quality video content with interactive exercises and practical projects.',
            'keywords' => 'video courses, interactive learning, visual learning, multimedia education'
        ];
        
        return view('courses.courses-list-7', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesList8() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->where('duration_hours', '>=', 10)
                        ->latest()
                        ->paginate(8);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Comprehensive Online Courses - In-Depth Learning Programs | ' . config('app.name'),
            'description' => 'Dive deep into subjects with comprehensive courses designed for thorough understanding and practical mastery.',
            'keywords' => 'comprehensive courses, in-depth learning, detailed curriculum, thorough training'
        ];
        
        return view('courses.courses-list-8', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesList9() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->where('price', 0)
                        ->latest()
                        ->paginate(12);
        $categories = Category::all();
        
        $seoData = [
            'title' => 'Free Online Courses - Quality Education at No Cost | ' . config('app.name'),
            'description' => 'Access high-quality free courses and start learning new skills without any cost. Perfect for beginners and lifelong learners.',
            'keywords' => 'free courses, no cost education, free learning, budget-friendly, accessible education'
        ];
        
        return view('courses.courses-list-9', compact('courses', 'categories', 'seoData'));
    }
    
    public function coursesListAll() {
        $courses = Course::with(['instructor', 'category'])
                        ->where('is_active', true)
                        ->latest()
                        ->paginate(20);
        $categories = Category::all();
        $totalCourses = Course::where('is_active', true)->count();
        
        $seoData = [
            'title' => 'All Online Courses - Complete Course Catalog | ' . config('app.name'),
            'description' => 'Browse our complete catalog of ' . $totalCourses . ' online courses across various categories. Find the perfect course for your learning goals.',
            'keywords' => 'all courses, complete catalog, course directory, online education, skill development'
        ];
        
        return view('courses.courses-list-all', compact('courses', 'categories', 'totalCourses', 'seoData'));
    }

    // Course single pages with dynamic data
    public function coursesSingle1() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->inRandomOrder()
                       ->first();
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $relatedCourses = Course::where('category_id', $course->category_id)
                               ->where('id', '!=', $course->id)
                               ->where('is_active', true)
                               ->take(4)
                               ->get();
        
        $seoData = [
            'title' => $course->title . ' - Learn ' . $course->category->name . ' | ' . config('app.name'),
            'description' => $course->meta_description ?: $course->short_description ?: strip_tags($course->description),
            'keywords' => $course->category->name . ', ' . $course->instructor->specialization . ', online learning, ' . $course->level
        ];
        
        return view('courses.courses-single-1', compact('course', 'relatedCourses', 'seoData'));
    }
    
    public function coursesSingle2() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->where('is_featured', true)
                       ->inRandomOrder()
                       ->first();
        
        if (!$course) {
            $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                           ->where('is_active', true)
                           ->inRandomOrder()
                           ->first();
        }
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $instructorCourses = Course::where('instructor_id', $course->instructor_id)
                                  ->where('id', '!=', $course->id)
                                  ->where('is_active', true)
                                  ->take(3)
                                  ->get();
        
        $seoData = [
            'title' => $course->title . ' by ' . $course->instructor->name . ' | ' . config('app.name'),
            'description' => $course->meta_description ?: $course->short_description ?: strip_tags($course->description),
            'keywords' => $course->category->name . ', ' . $course->instructor->name . ', expert instructor, quality course'
        ];
        
        return view('courses.courses-single-2', compact('course', 'instructorCourses', 'seoData'));
    }
    
    public function coursesSingle3() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->orderBy('rating', 'desc')
                       ->first();
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $topRatedCourses = Course::where('rating', '>=', 4)
                                ->where('id', '!=', $course->id)
                                ->where('is_active', true)
                                ->orderBy('rating', 'desc')
                                ->take(4)
                                ->get();
        
        $seoData = [
            'title' => $course->title . ' - Top Rated Course ⭐ ' . $course->rating . '/5 | ' . config('app.name'),
            'description' => 'Highly rated course: ' . $course->title . '. Join ' . $course->total_students . ' students who rated this course ' . $course->rating . '/5 stars.',
            'keywords' => 'top rated course, ' . $course->category->name . ', high quality, student reviewed, ' . $course->rating . ' stars'
        ];
        
        return view('courses.courses-single-3', compact('course', 'topRatedCourses', 'seoData'));
    }
    
    public function coursesSingle4() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->orderBy('total_students', 'desc')
                       ->first();
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $popularCourses = Course::where('total_students', '>', 50)
                               ->where('id', '!=', $course->id)
                               ->where('is_active', true)
                               ->orderBy('total_students', 'desc')
                               ->take(4)
                               ->get();
        
        $seoData = [
            'title' => $course->title . ' - Most Popular Course 🔥 ' . $course->total_students . '+ Students | ' . config('app.name'),
            'description' => 'Most popular: ' . $course->title . '. Join ' . $course->total_students . '+ students in this trending course.',
            'keywords' => 'popular course, trending, ' . $course->category->name . ', ' . $course->total_students . ' students, bestseller'
        ];
        
        return view('courses.courses-single-4', compact('course', 'popularCourses', 'seoData'));
    }
    
    public function coursesSingle5() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->where('level', 'Advanced')
                       ->inRandomOrder()
                       ->first();
        
        if (!$course) {
            $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                           ->where('is_active', true)
                           ->inRandomOrder()
                           ->first();
        }
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $advancedCourses = Course::where('level', 'Advanced')
                                ->where('id', '!=', $course->id)
                                ->where('is_active', true)
                                ->take(4)
                                ->get();
        
        $seoData = [
            'title' => $course->title . ' - Advanced Level Course 🎯 | ' . config('app.name'),
            'description' => 'Master advanced concepts in ' . $course->category->name . ' with this comprehensive course: ' . $course->title,
            'keywords' => 'advanced course, ' . $course->category->name . ', expert level, professional development, mastery'
        ];
        
        return view('courses.courses-single-5', compact('course', 'advancedCourses', 'seoData'));
    }
    
    public function coursesSingle6() {
        $course = Course::with(['instructor', 'category', 'lessons', 'reviews.user'])
                       ->where('is_active', true)
                       ->latest()
                       ->first();
        
        if (!$course) {
            return redirect()->route('courses.list-1');
        }
        
        $newCourses = Course::where('is_active', true)
                           ->where('id', '!=', $course->id)
                           ->latest()
                           ->take(4)
                           ->get();
        
        $seoData = [
            'title' => $course->title . ' - Latest Course 🆕 | ' . config('app.name'),
            'description' => 'New course available: ' . $course->title . '. Stay updated with the latest skills in ' . $course->category->name,
            'keywords' => 'new course, latest, ' . $course->category->name . ', updated content, fresh learning'
        ];
        
        return view('courses.courses-single-6', compact('course', 'newCourses', 'seoData'));
    }
}
