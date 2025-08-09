@extends('layouts.front')

@section('title', $seoData['title'])
@section('meta_description', $seoData['description'])
@section('meta_keywords', $seoData['keywords'])

@push('styles')
<style>
.course-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}
.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
}
.rating-stars {
    color: #ffc107;
}
.course-price {
    font-weight: 600;
    color: #28a745;
}
.course-discount {
    text-decoration: line-through;
    color: #6c757d;
    font-size: 0.9em;
}
.instructor-badge {
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75em;
}
.category-badge {
    background: #28a745;
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75em;
}
.level-badge {
    background: #ffc107;
    color: #212529;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75em;
}
.search-filter-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 2rem 0;
}
.popular-course-sidebar {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1.5rem;
}
</style>
@endpush

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('courses') }}" class="text-decoration-none">Courses</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Best Online Courses</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="search-filter-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 mb-3">🏆 Best Online Courses</h1>
                <p class="lead mb-4">Discover the highest-rated courses with proven results. Join thousands of students who have transformed their careers with our top-quality programs.</p>
                
                <!-- Search Form -->
                <div class="row g-3">
                    <div class="col-md-5">
                        <input type="text" class="form-control form-control-lg" placeholder="Search courses..." id="courseSearch">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-lg" id="categoryFilter">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select form-select-lg" id="levelFilter">
                            <option value="">All Levels</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning btn-lg w-100" type="button" id="searchBtn">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="bg-white bg-opacity-10 rounded p-4">
                    <h3 class="mb-2">{{ $courses->total() }}</h3>
                    <p class="mb-0">High-Quality Courses Available</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <!-- Courses Grid -->
        <div class="col-lg-8">
            <!-- Results Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h4 mb-1">Showing {{ $courses->count() }} of {{ $courses->total() }} courses</h2>
                    <p class="text-muted mb-0">Sorted by highest ratings and student satisfaction</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown">
                        Sort by: Rating
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?sort=rating">Highest Rating</a></li>
                        <li><a class="dropdown-item" href="?sort=students">Most Popular</a></li>
                        <li><a class="dropdown-item" href="?sort=price">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="?sort=latest">Latest</a></li>
                    </ul>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="row g-4" id="coursesContainer">
                @forelse($courses as $course)
                    <div class="col-md-6 course-item" 
                         data-category="{{ $course->category_id }}" 
                         data-level="{{ $course->level }}" 
                         data-title="{{ strtolower($course->title) }}">
                        <div class="card course-card h-100">
                            <!-- Course Image -->
                            <div class="position-relative">
                                <img src="{{ getImageUrl($course->image, 'course', $course->title, '400x200') }}" 
                                     class="card-img-top" 
                                     alt="{{ $course->title }}"
                                     style="height: 200px; object-fit: cover;"
                                     onerror="this.src='{{ getImageUrl(null, 'course', $course->title, '400x200') }}'; this.onerror=null;">
                                
                                <!-- Badges -->
                                <div class="position-absolute top-0 start-0 p-2">
                                    <span class="category-badge">{{ $course->category->name }}</span>
                                </div>
                                <div class="position-absolute top-0 end-0 p-2">
                                    <span class="level-badge">{{ $course->level }}</span>
                                </div>
                                
                                @if($course->discount_percentage > 0)
                                    <div class="position-absolute bottom-0 end-0 p-2">
                                        <span class="badge bg-danger">{{ $course->discount_percentage }}% OFF</span>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <!-- Course Title -->
                                <h3 class="card-title h5 mb-2">
                                    <a href="{{ route('courses.single-1') }}" class="text-decoration-none text-dark">
                                        {{ $course->title }}
                                    </a>
                                </h3>

                                <!-- Course Description -->
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit(strip_tags($course->short_description ?: $course->description), 100) }}
                                </p>

                                <!-- Instructor -->
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ getImageUrl($course->instructor->image, 'user', $course->instructor->name, '32x32') }}" 
                                         class="rounded-circle me-2" 
                                         width="32" height="32" 
                                         alt="{{ $course->instructor->name }}"
                                         onerror="this.src='{{ getImageUrl(null, 'user', $course->instructor->name, '32x32') }}'; this.onerror=null;">
                                    <div class="small">
                                        <div class="fw-medium">{{ $course->instructor->name }}</div>
                                        <div class="text-muted">{{ $course->instructor->specialization }}</div>
                                    </div>
                                </div>

                                <!-- Course Stats -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        @if($course->rating > 0)
                                            <div class="rating-stars me-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= floor($course->rating))
                                                        <i class="fas fa-star"></i>
                                                    @elseif($i <= ceil($course->rating))
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <small class="text-muted">{{ number_format($course->rating, 1) }} ({{ $course->total_reviews }})</small>
                                        @endif
                                    </div>
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1"></i>{{ number_format($course->total_students) }} students
                                    </small>
                                </div>

                                <!-- Course Details -->
                                <div class="row g-2 mb-3 small text-muted">
                                    <div class="col-6">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $course->duration_hours }}h {{ $course->duration_minutes }}m
                                    </div>
                                    <div class="col-6">
                                        <i class="fas fa-play-circle me-1"></i>
                                        {{ $course->total_lessons }} lessons
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="card-footer bg-transparent border-0 pt-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Price -->
                                    <div>
                                        @if($course->price > 0)
                                            @if($course->discount_price)
                                                <span class="course-price h5 mb-0">${{ number_format($course->discount_price, 2) }}</span>
                                                <span class="course-discount ms-2">${{ number_format($course->price, 2) }}</span>
                                            @else
                                                <span class="course-price h5 mb-0">${{ number_format($course->price, 2) }}</span>
                                            @endif
                                        @else
                                            <span class="course-price h5 mb-0 text-success">FREE</span>
                                        @endif
                                    </div>
                                    
                                    <!-- Action Buttons -->
                                    <div>
                                        <button class="btn btn-outline-primary btn-sm me-1" title="Add to Wishlist">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <a href="{{ route('courses.single-1') }}" class="btn btn-primary btn-sm">
                                            View Course
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-3x text-muted mb-3"></i>
                            <h3 class="text-muted">No courses found</h3>
                            <p class="text-muted">Try adjusting your search criteria or browse all courses.</p>
                            <a href="{{ route('courses.list-all') }}" class="btn btn-primary">Browse All Courses</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($courses->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $courses->links() }}
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Popular Courses -->
            @if(isset($popularCourses) && $popularCourses->count() > 0)
                <div class="popular-course-sidebar mb-4">
                    <h4 class="h5 mb-3">🔥 Popular Courses</h4>
                    @foreach($popularCourses as $popular)
                        <div class="d-flex mb-3">
                            <img src="{{ getImageUrl($popular->image, 'course', $popular->title, '60x40') }}" 
                                 class="rounded me-3" 
                                 width="60" height="40" 
                                 style="object-fit: cover;"
                                 alt="{{ $popular->title }}"
                                 onerror="this.src='{{ getImageUrl(null, 'course', $popular->title, '60x40') }}'; this.onerror=null;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1 small">
                                    <a href="{{ route('courses.single-1') }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($popular->title, 40) }}
                                    </a>
                                </h6>
                                <div class="small text-muted">
                                    {{ number_format($popular->total_students) }} students
                                </div>
                                <div class="small">
                                    @if($popular->price > 0)
                                        <span class="text-success fw-medium">
                                            ${{ number_format($popular->final_price, 2) }}
                                        </span>
                                    @else
                                        <span class="text-success fw-medium">FREE</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Categories -->
            <div class="popular-course-sidebar mb-4">
                <h4 class="h5 mb-3">📚 Browse by Category</h4>
                @foreach($categories as $category)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="{{ route('courses.list-1', ['category' => $category->id]) }}" 
                           class="text-decoration-none">
                            {{ $category->name }}
                        </a>
                        <span class="badge bg-secondary">
                            {{ $category->courses_count ?? rand(5, 50) }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Top Instructors -->
            <div class="popular-course-sidebar">
                <h4 class="h5 mb-3">👨‍🏫 Top Instructors</h4>
                @foreach($instructors->take(5) as $instructor)
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ getImageUrl($instructor->image, 'user', $instructor->name, '40x40') }}" 
                             class="rounded-circle me-3" 
                             width="40" height="40" 
                             alt="{{ $instructor->name }}"
                             onerror="this.src='{{ getImageUrl(null, 'user', $instructor->name, '40x40') }}'; this.onerror=null;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 small">{{ $instructor->name }}</h6>
                            <div class="small text-muted">
                                {{ $instructor->specialization }}
                            </div>
                            <div class="small">
                                ⭐ {{ number_format($instructor->rating, 1) }} 
                                • {{ number_format($instructor->total_students) }} students
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h2 class="mb-3">Ready to Start Learning?</h2>
        <p class="lead mb-4">Join over 100,000 students who have transformed their careers with our courses.</p>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="h3 mb-1">⭐ 4.8/5</div>
                <div>Average Rating</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="h3 mb-1">🎓 50k+</div>
                <div>Happy Students</div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="h3 mb-1">📚 200+</div>
                <div>Quality Courses</div>
            </div>
        </div>
        <a href="{{ route('auth.register') }}" class="btn btn-warning btn-lg mt-3">
            Start Learning Today
        </a>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center mb-5">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What makes these courses the "best"?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our "best" courses are selected based on student ratings, completion rates, instructor expertise, and career impact. Each course maintains a minimum 4.0-star rating and has helped thousands of students achieve their learning goals.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do I get a certificate after completion?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! Upon successful completion of any paid course, you'll receive a certificate of completion that you can add to your LinkedIn profile and resume.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I access courses on mobile devices?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! Our platform is fully responsive and optimized for mobile learning. You can access all course content, videos, and assignments from any device.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('courseSearch');
    const categoryFilter = document.getElementById('categoryFilter');
    const levelFilter = document.getElementById('levelFilter');
    const searchBtn = document.getElementById('searchBtn');
    const courseItems = document.querySelectorAll('.course-item');

    function filterCourses() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value;
        const selectedLevel = levelFilter.value;

        courseItems.forEach(item => {
            const title = item.dataset.title;
            const category = item.dataset.category;
            const level = item.dataset.level;

            const matchesSearch = !searchTerm || title.includes(searchTerm);
            const matchesCategory = !selectedCategory || category === selectedCategory;
            const matchesLevel = !selectedLevel || level === selectedLevel;

            if (matchesSearch && matchesCategory && matchesLevel) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Event listeners
    searchBtn.addEventListener('click', filterCourses);
    searchInput.addEventListener('input', filterCourses);
    categoryFilter.addEventListener('change', filterCourses);
    levelFilter.addEventListener('change', filterCourses);

    // Enter key support
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            filterCourses();
        }
    });

    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endpush
