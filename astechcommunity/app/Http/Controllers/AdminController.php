<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\BlogPost;
use App\MembershipPlan;
use App\Faq;
use App\Freelancer;
use App\Mentor;
use App\Client;
use App\CharityProgram;
use App\SeoPage;
use App\Course;
use App\Category;
use App\Instructor;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get counts for dashboard stats - handle missing tables gracefully
        $stats = [];
        
        try {
            $stats['services'] = Service::count();
        } catch (\Exception $e) {
            $stats['services'] = 0;
        }
        
        try {
            $stats['blog_posts'] = BlogPost::count();
        } catch (\Exception $e) {
            $stats['blog_posts'] = 0;
        }
        
        try {
            $stats['membership_plans'] = MembershipPlan::count();
        } catch (\Exception $e) {
            $stats['membership_plans'] = 0;
        }
        
        try {
            $stats['faqs'] = Faq::count();
        } catch (\Exception $e) {
            $stats['faqs'] = 0;
        }
        
        try {
            $stats['freelancers'] = Freelancer::count();
        } catch (\Exception $e) {
            $stats['freelancers'] = 0;
        }
        
        try {
            $stats['mentors'] = Mentor::count();
        } catch (\Exception $e) {
            $stats['mentors'] = 0;
        }
        
        try {
            $stats['clients'] = Client::count();
        } catch (\Exception $e) {
            $stats['clients'] = 0;
        }
        
        try {
            $stats['charity_programs'] = CharityProgram::count();
        } catch (\Exception $e) {
            $stats['charity_programs'] = 0;
        }
        
        try {
            $stats['seo_pages'] = SeoPage::count();
        } catch (\Exception $e) {
            $stats['seo_pages'] = 0;
        }

        return view('admin.dashboard', compact('stats'));
    }

    // ========== COURSES CRUD ==========
    public function coursesIndex()
    {
        $courses = Course::with(['instructor', 'category'])->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function coursesCreate()
    {
        $categories = Category::orderBy('name')->get();
        $instructors = Instructor::orderBy('name')->get();
        return view('admin.courses.create', compact('categories', 'instructors'));
    }

    public function coursesStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'instructor_id' => 'required|exists:instructors,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'video_url' => 'nullable|string',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'duration_hours' => 'nullable|integer|min:0',
            'duration_minutes' => 'nullable|integer|min:0|max:59',
            'total_lessons' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'what_you_learn' => 'nullable|array',
            'requirements' => 'nullable|array',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/courses', 'public');
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully!');
    }

    public function coursesShow(Course $course)
    {
        $course->load(['instructor', 'category']);
        return view('admin.courses.show', compact('course'));
    }

    public function coursesEdit(Course $course)
    {
        $categories = Category::orderBy('name')->get();
        $instructors = Instructor::orderBy('name')->get();
        return view('admin.courses.edit', compact('course', 'categories', 'instructors'));
    }

    public function coursesUpdate(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'instructor_id' => 'required|exists:instructors,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'video_url' => 'nullable|string',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'duration_hours' => 'nullable|integer|min:0',
            'duration_minutes' => 'nullable|integer|min:0|max:59',
            'total_lessons' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'what_you_learn' => 'nullable|array',
            'requirements' => 'nullable|array',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/courses', 'public');
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    public function coursesDestroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }

    // ========== SERVICES CRUD ==========
    public function servicesIndex()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function servicesCreate()
    {
        return view('admin.services.create');
    }

    public function servicesStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $serviceData = [
            'title' => $data['title'],
            'short_description' => Str::limit(strip_tags($data['description']), 160),
            'description' => $data['description'],
            'price' => $data['price'] ?? null,
            'price_type' => 'fixed',
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'sort_order' => 0,
        ];

        if ($request->hasFile('featured_image')) {
            $serviceData['image'] = $request->file('featured_image')->store('uploads/services', 'public');
        }

        Service::create($serviceData);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function servicesShow(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function servicesEdit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function servicesUpdate(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $serviceData = [
            'title' => $data['title'],
            'short_description' => Str::limit(strip_tags($data['description']), 160),
            'description' => $data['description'],
            'price' => $data['price'] ?? null,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('featured_image')) {
            $serviceData['image'] = $request->file('featured_image')->store('uploads/services', 'public');
        }

        $service->update($serviceData);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function servicesDestroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }

    // ========== BLOG POSTS CRUD ==========
    public function blogIndex()
    {
        $posts = BlogPost::latest()->paginate(10);
        $totalPosts = BlogPost::count();
        $publishedPostsCount = BlogPost::where('status', 'published')->count();
        $draftPostsCount = BlogPost::where('status', 'draft')->count();
        $todayPostsCount = BlogPost::whereDate('created_at', now()->toDateString())->count();
        return view('admin.blog.index', compact('posts', 'totalPosts', 'publishedPostsCount', 'draftPostsCount', 'todayPostsCount'));
    }

    public function blogCreate()
    {
        return view('admin.blog.create');
    }

    public function blogStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'tags' => 'nullable',
            'published_at' => 'nullable|date',
        ]);

        $payload = [
            'title' => $data['title'],
            'slug' => \Str::slug($data['title']),
            'content' => $data['content'],
            'excerpt' => $data['excerpt'] ?? null,
            'author_id' => auth()->id() ?? 1,
            'category_id' => null,
            'tags' => is_string($data['tags'] ?? null) ? array_map('trim', explode(',', $data['tags'])) : ($data['tags'] ?? []),
            'status' => $request->has('is_published') ? 'published' : 'draft',
            'published_at' => $data['published_at'] ?? now(),
            'is_featured' => false,
        ];

        if ($request->hasFile('featured_image')) {
            $payload['featured_image'] = $request->file('featured_image')->store('uploads/blog', 'public');
        }

        BlogPost::create($payload);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully!');
    }

    public function blogShow(BlogPost $post)
    {
        return view('admin.blog.show', compact('post'));
    }

    public function blogEdit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    public function blogUpdate(Request $request, BlogPost $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'tags' => 'nullable',
            'published_at' => 'nullable|date',
        ]);

        $payload = [
            'title' => $data['title'],
            'slug' => \Str::slug($data['title']),
            'content' => $data['content'],
            'excerpt' => $data['excerpt'] ?? null,
            'tags' => is_string($data['tags'] ?? null) ? array_map('trim', explode(',', $data['tags'])) : ($data['tags'] ?? []),
            'status' => $request->has('is_published') ? 'published' : 'draft',
            'published_at' => $data['published_at'] ?? $post->published_at ?? now(),
        ];

        if ($request->hasFile('featured_image')) {
            $payload['featured_image'] = $request->file('featured_image')->store('uploads/blog', 'public');
        }

        $post->update($payload);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function blogDestroy(BlogPost $post)
    {
        $post->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully!');
    }

    // ========== FAQS CRUD ==========
    public function faqsIndex()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function faqsCreate()
    {
        return view('admin.faqs.create');
    }

    public function faqsStore(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully!');
    }

    public function faqsShow(Faq $faq)
    {
        return view('admin.faqs.show', compact('faq'));
    }

    public function faqsEdit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function faqsUpdate(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully!');
    }

    public function faqsDestroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully!');
    }

    // ========== MEMBERSHIP PLANS CRUD ==========
    public function membershipIndex()
    {
        $plans = MembershipPlan::latest()->paginate(10);
        return view('admin.membership.index', compact('plans'));
    }

    public function membershipCreate()
    {
        return view('admin.membership.create');
    }

    public function membershipStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_type' => 'required|string|max:20',
            'duration_value' => 'required|integer|min:1',
            'features' => 'nullable',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'max_members' => 'nullable|integer|min:1',
        ]);

        $planData = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'],
            'price' => $data['price'],
            'billing_cycle' => $data['duration_type'],
            'discount_percentage' => 0,
            'features' => is_string($data['features'] ?? null) ? json_decode($data['features'], true) : ($data['features'] ?? []),
            'is_active' => $request->has('is_active'),
            'is_popular' => $request->has('is_featured'),
            'sort_order' => 0,
        ];

        MembershipPlan::create($planData);

        return redirect()->route('admin.membership.index')->with('success', 'Membership plan created successfully!');
    }

    public function membershipShow(MembershipPlan $plan)
    {
        return view('admin.membership.show', compact('plan'));
    }

    public function membershipEdit(MembershipPlan $plan)
    {
        return view('admin.membership.edit', compact('plan'));
    }

    public function membershipUpdate(Request $request, MembershipPlan $plan)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration_type' => 'required|string|max:20',
            'duration_value' => 'required|integer|min:1',
            'features' => 'nullable',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'max_members' => 'nullable|integer|min:1',
        ]);

        $planData = [
            'name' => $data['name'],
            'slug' => $plan->slug ?: Str::slug($data['name']),
            'description' => $data['description'],
            'price' => $data['price'],
            'billing_cycle' => $data['duration_type'],
            'features' => is_string($data['features'] ?? null) ? json_decode($data['features'], true) : ($data['features'] ?? []),
            'is_active' => $request->has('is_active'),
            'is_popular' => $request->has('is_featured'),
        ];

        $plan->update($planData);

        return redirect()->route('admin.membership.index')->with('success', 'Membership plan updated successfully!');
    }

    public function membershipDestroy(MembershipPlan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.membership.index')->with('success', 'Membership plan deleted successfully!');
    }

    // ========== FREELANCERS CRUD ==========
    public function freelancersIndex()
    {
        $freelancers = Freelancer::latest()->paginate(10);
        return view('admin.freelancers.index', compact('freelancers'));
    }

    public function freelancersCreate()
    {
        return view('admin.freelancers.create');
    }

    public function freelancersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:freelancers,email',
            'phone' => 'nullable|string|max:20',
            'skills' => 'required',
            'experience_level' => 'required|string|max:20',
            'hourly_rate' => 'required|numeric|min:0',
            'availability' => 'required|string|max:20',
            'portfolio_url' => 'nullable|url',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_verified' => 'boolean',
            'is_available' => 'boolean',
        ]);

        $validated['is_verified'] = $request->has('is_verified');
        $validated['is_available'] = $request->has('is_available');

        if (is_string($validated['skills'] ?? null)) {
            $validated['skills'] = array_map('trim', explode(',', $validated['skills']));
        }

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('uploads/freelancers', 'public');
        }

        Freelancer::create($validated);

        return redirect()->route('admin.freelancers.index')->with('success', 'Freelancer created successfully!');
    }

    public function freelancersShow(Freelancer $freelancer)
    {
        return view('admin.freelancers.show', compact('freelancer'));
    }

    public function freelancersEdit(Freelancer $freelancer)
    {
        return view('admin.freelancers.edit', compact('freelancer'));
    }

    public function freelancersUpdate(Request $request, Freelancer $freelancer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:freelancers,email,' . $freelancer->id,
            'phone' => 'nullable|string|max:20',
            'skills' => 'required',
            'experience_level' => 'required|string|max:20',
            'hourly_rate' => 'required|numeric|min:0',
            'availability' => 'required|string|max:20',
            'portfolio_url' => 'nullable|url',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_verified' => 'boolean',
            'is_available' => 'boolean',
        ]);

        $validated['is_verified'] = $request->has('is_verified');
        $validated['is_available'] = $request->has('is_available');

        if (is_string($validated['skills'] ?? null)) {
            $validated['skills'] = array_map('trim', explode(',', $validated['skills']));
        }

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('uploads/freelancers', 'public');
        }

        $freelancer->update($validated);

        return redirect()->route('admin.freelancers.index')->with('success', 'Freelancer updated successfully!');
    }

    public function freelancersDestroy(Freelancer $freelancer)
    {
        $freelancer->delete();
        return redirect()->route('admin.freelancers.index')->with('success', 'Freelancer deleted successfully!');
    }

    // ========== MENTORS CRUD ==========
    public function mentorsIndex()
    {
        $mentors = Mentor::latest()->paginate(10);
        return view('admin.mentors.index', compact('mentors'));
    }

    public function mentorsCreate()
    {
        return view('admin.mentors.create');
    }

    public function mentorsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mentors,email',
            'expertise' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'session_rate' => 'required|numeric|min:0',
            'availability_hours' => 'nullable|string',
            'bio' => 'nullable|string',
            'linkedin_profile' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_accepting_sessions' => 'boolean',
            'is_verified' => 'boolean',
        ]);

        $validated['is_accepting_sessions'] = $request->has('is_accepting_sessions');
        $validated['is_verified'] = $request->has('is_verified');

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('uploads/mentors', 'public');
        }

        Mentor::create($validated);

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor created successfully!');
    }

    public function mentorsShow(Mentor $mentor)
    {
        return view('admin.mentors.show', compact('mentor'));
    }

    public function mentorsEdit(Mentor $mentor)
    {
        return view('admin.mentors.edit', compact('mentor'));
    }

    public function mentorsUpdate(Request $request, Mentor $mentor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:mentors,email,' . $mentor->id,
            'expertise' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'session_rate' => 'required|numeric|min:0',
            'availability_hours' => 'nullable|string',
            'bio' => 'nullable|string',
            'linkedin_profile' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_accepting_sessions' => 'boolean',
            'is_verified' => 'boolean',
        ]);

        $validated['is_accepting_sessions'] = $request->has('is_accepting_sessions');
        $validated['is_verified'] = $request->has('is_verified');

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('uploads/mentors', 'public');
        }

        $mentor->update($validated);

        return redirect()->route('admin.mentors.index')->with('success', 'Mentor updated successfully!');
    }

    public function mentorsDestroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('admin.mentors.index')->with('success', 'Mentor deleted successfully!');
    }

    // ========== CLIENTS CRUD ==========
    public function clientsIndex()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function clientsCreate()
    {
        return view('admin.clients.create');
    }

    public function clientsStore(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,contact_email',
            'phone' => 'nullable|string|max:20',
            'industry' => 'required|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'project_budget' => 'nullable|numeric|min:0',
            'requirements' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'website_url' => 'nullable|url',
            'partnership_type' => 'nullable|string|max:100',
            'is_active_client' => 'boolean',
        ]);

        $clientData = [
            'company_name' => $data['company_name'],
            'slug' => Str::slug($data['company_name']),
            'description' => $data['requirements'] ?? null,
            'industry' => $data['industry'],
            'website_url' => $data['website_url'] ?? null,
            'contact_email' => $data['email'],
            'contact_phone' => $data['phone'] ?? null,
            'contact_person_name' => $data['contact_person'] ?? null,
            'company_size' => $data['company_size'] ?? '',
            'project_budget_min' => $data['project_budget'] ?? null,
            'project_budget_max' => $data['project_budget'] ?? null,
            'partnership_type' => $data['partnership_type'] ?? 'prospect',
            'partnership_status' => 'active',
            'is_featured' => false,
            'is_active' => $request->has('is_active_client'),
        ];

        if ($request->hasFile('company_logo')) {
            $clientData['logo'] = $request->file('company_logo')->store('uploads/clients', 'public');
        }

        Client::create($clientData);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully!');
    }

    public function clientsShow(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    public function clientsEdit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function clientsUpdate(Request $request, Client $client)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,contact_email,' . $client->id,
            'phone' => 'nullable|string|max:20',
            'industry' => 'required|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'project_budget' => 'nullable|numeric|min:0',
            'requirements' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'website_url' => 'nullable|url',
            'partnership_type' => 'nullable|string|max:100',
            'is_active_client' => 'boolean',
        ]);

        $clientData = [
            'company_name' => $data['company_name'],
            'slug' => $client->slug ?: Str::slug($data['company_name']),
            'description' => $data['requirements'] ?? null,
            'industry' => $data['industry'],
            'website_url' => $data['website_url'] ?? null,
            'contact_email' => $data['email'],
            'contact_phone' => $data['phone'] ?? null,
            'contact_person_name' => $data['contact_person'] ?? null,
            'company_size' => $data['company_size'] ?? '',
            'project_budget_min' => $data['project_budget'] ?? null,
            'project_budget_max' => $data['project_budget'] ?? null,
            'partnership_type' => $data['partnership_type'] ?? $client->partnership_type,
            'is_active' => $request->has('is_active_client'),
        ];

        if ($request->hasFile('company_logo')) {
            $clientData['logo'] = $request->file('company_logo')->store('uploads/clients', 'public');
        }

        $client->update($clientData);

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');
    }

    public function clientsDestroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully!');
    }

    // ========== CHARITY PROGRAMS CRUD ==========
    public function charityIndex()
    {
        $programs = CharityProgram::latest()->paginate(10);
        return view('admin.charity.index', compact('programs'));
    }

    public function charityCreate()
    {
        return view('admin.charity.create');
    }

    public function charityStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'beneficiary' => 'required|string|max:255',
            'program_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['current_amount'] = $validated['current_amount'] ?? 0;

        if ($request->hasFile('program_image')) {
            $validated['program_image'] = $request->file('program_image')->store('uploads/charity', 'public');
        }

        CharityProgram::create($validated);

        return redirect()->route('admin.charity.index')->with('success', 'Charity program created successfully!');
    }

    public function charityShow(CharityProgram $program)
    {
        return view('admin.charity.show', compact('program'));
    }

    public function charityEdit(CharityProgram $program)
    {
        return view('admin.charity.edit', compact('program'));
    }

    public function charityUpdate(Request $request, CharityProgram $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
            'current_amount' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'beneficiary' => 'required|string|max:255',
            'program_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('program_image')) {
            $validated['program_image'] = $request->file('program_image')->store('uploads/charity', 'public');
        }

        $program->update($validated);

        return redirect()->route('admin.charity.index')->with('success', 'Charity program updated successfully!');
    }

    public function charityDestroy(CharityProgram $program)
    {
        $program->delete();
        return redirect()->route('admin.charity.index')->with('success', 'Charity program deleted successfully!');
    }

    // ========== SEO PAGES CRUD ==========
    public function seoIndex()
    {
        $seoPages = SeoPage::latest()->paginate(10);
        return view('admin.seo.index', compact('seoPages'));
    }

    public function seoCreate()
    {
        return view('admin.seo.create');
    }

    public function seoStore(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:seo_pages,page_name',
            'page_url' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:300',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'canonical_url' => 'nullable|url',
            'robots' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('uploads/seo', 'public');
        }

        SeoPage::create($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO page created successfully!');
    }

    public function seoShow(SeoPage $seoPage)
    {
        return view('admin.seo.show', compact('seoPage'));
    }

    public function seoEdit(SeoPage $seoPage)
    {
        return view('admin.seo.edit', compact('seoPage'));
    }

    public function seoUpdate(Request $request, SeoPage $seoPage)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:seo_pages,page_name,' . $seoPage->id,
            'page_url' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:300',
            'og_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'canonical_url' => 'nullable|url',
            'robots' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('og_image')) {
            $validated['og_image'] = $request->file('og_image')->store('uploads/seo', 'public');
        }

        $seoPage->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO page updated successfully!');
    }

    public function seoDestroy(SeoPage $seoPage)
    {
        $seoPage->delete();
        return redirect()->route('admin.seo.index')->with('success', 'SEO page deleted successfully!');
    }
}
