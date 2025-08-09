@extends('layouts.front')

@section('title', isset($lesson) ? $lesson->title . ' | ' . $lesson->course->title . ' | ' . config('app.name') : 'Interactive Lesson Experience | ' . config('app.name'))
@section('meta_description', isset($lesson) ? Str::limit(strip_tags($lesson->description ?: $lesson->content), 160) : 'Experience interactive online learning with video tutorials, assignments, and downloadable resources.')
@section('meta_keywords', isset($lesson) ? 'lesson, ' . $lesson->course->category->name . ', online learning, video tutorial, ' . $lesson->course->level : 'online lesson, video learning, interactive tutorial, course content')

@push('styles')
<style>
.lesson-video-container {
    position: relative;
    background: #000;
    border-radius: 10px;
    overflow: hidden;
}
.lesson-sidebar {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1.5rem;
    height: fit-content;
    position: sticky;
    top: 2rem;
}
.lesson-progress {
    height: 4px;
    background: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
}
.lesson-progress-bar {
    height: 100%;
    background: linear-gradient(45deg, #28a745, #20c997);
    transition: width 0.3s ease;
}
.lesson-tab {
    border: none;
    background: transparent;
    padding: 1rem 1.5rem;
    border-bottom: 3px solid transparent;
    transition: all 0.3s ease;
}
.lesson-tab.active {
    border-bottom-color: #007bff;
    background: #f8f9fa;
    color: #007bff;
    font-weight: 600;
}
.lesson-content-area {
    min-height: 400px;
    padding: 2rem;
    background: white;
    border-radius: 10px;
}
.lesson-list-item {
    padding: 0.75rem 1rem;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    margin-bottom: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}
.lesson-list-item:hover {
    background: #f8f9fa;
    border-color: #007bff;
}
.lesson-list-item.completed {
    background: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
.lesson-list-item.current {
    background: #cce5ff;
    border-color: #007bff;
    color: #004085;
    font-weight: 600;
}
.attachment-item {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.attachment-item:hover {
    border-color: #007bff;
    box-shadow: 0 2px 8px rgba(0,123,255,0.15);
}
.note-taking-area {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 1rem;
    min-height: 200px;
    background: white;
}
.instructor-info {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 1rem;
}
</style>
@endpush

@section('content')
@php
    // Sample lesson data if none provided
    $lesson = $lesson ?? (object)[
        'title' => 'Introduction to Advanced JavaScript Concepts',
        'course' => (object)[
            'title' => 'Complete JavaScript Mastery Course',
            'category' => (object)['name' => 'Programming'],
            'level' => 'Intermediate',
            'instructor' => (object)[
                'name' => 'John Smith',
                'image' => null,
                'specialization' => 'Senior JavaScript Developer'
            ]
        ],
        'description' => 'Learn advanced JavaScript concepts including closures, prototypes, and async programming.',
        'content' => '<p>In this comprehensive lesson, we will dive deep into advanced JavaScript concepts that every developer should master.</p><p>Topics covered include closures, prototypal inheritance, event loop, promises, and async/await patterns.</p>',
        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'video_duration' => '45:30',
        'sort_order' => 3,
        'is_preview' => false,
        'attachments' => [
            'slides' => 'javascript-advanced-slides.pdf',
            'code' => 'lesson-code-examples.zip',
            'resources' => 'additional-resources.pdf'
        ]
    ];
    
    $courseLessons = [
        (object)['id' => 1, 'title' => 'JavaScript Fundamentals', 'duration' => '30:15', 'completed' => true, 'sort_order' => 1],
        (object)['id' => 2, 'title' => 'DOM Manipulation Basics', 'duration' => '25:45', 'completed' => true, 'sort_order' => 2],
        (object)['id' => 3, 'title' => 'Advanced JavaScript Concepts', 'duration' => '45:30', 'completed' => false, 'sort_order' => 3],
        (object)['id' => 4, 'title' => 'Async Programming & Promises', 'duration' => '35:20', 'completed' => false, 'sort_order' => 4],
        (object)['id' => 5, 'title' => 'Working with APIs', 'duration' => '40:10', 'completed' => false, 'sort_order' => 5],
    ];
@endphp

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
            <li class="breadcrumb-item">
                <a href="{{ route('courses.single-1') }}" class="text-decoration-none">{{ $lesson->course->title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $lesson->title }}</li>
        </ol>
    </div>
</nav>

<!-- Main Content -->
<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Video and Content Area -->
        <div class="col-lg-8">
            <!-- Lesson Header -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h1 class="h3 mb-2">{{ $lesson->title }}</h1>
                        <p class="text-muted mb-0">
                            <i class="fas fa-clock me-2"></i>{{ $lesson->video_duration }}
                            <span class="mx-2">•</span>
                            <i class="fas fa-signal me-2"></i>{{ $lesson->course->level }}
                            <span class="mx-2">•</span>
                            <i class="fas fa-tag me-2"></i>{{ $lesson->course->category->name }}
                        </p>
                    </div>
                    <div>
                        @if(!$lesson->is_preview)
                            <span class="badge bg-primary">Premium Content</span>
                        @else
                            <span class="badge bg-success">Free Preview</span>
                        @endif
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="lesson-progress mb-3">
                    <div class="lesson-progress-bar" style="width: 60%" id="lessonProgress"></div>
                </div>
                <small class="text-muted">Lesson {{ $lesson->sort_order }} of {{ count($courseLessons) }} • 60% completed</small>
            </div>

            <!-- Video Container -->
            <div class="lesson-video-container mb-4">
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                        title="{{ $lesson->title }}"
                        allowfullscreen
                        id="lessonVideo">
                    </iframe>
                </div>
            </div>

            <!-- Lesson Tabs -->
            <div class="card">
                <div class="card-header border-bottom-0 p-0">
                    <nav class="nav nav-tabs border-0" id="lessonTabs" role="tablist">
                        <button class="lesson-tab active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                            <i class="fas fa-info-circle me-2"></i>Overview
                        </button>
                        <button class="lesson-tab" id="resources-tab" data-bs-toggle="tab" data-bs-target="#resources" type="button" role="tab">
                            <i class="fas fa-download me-2"></i>Resources
                        </button>
                        <button class="lesson-tab" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button" role="tab">
                            <i class="fas fa-sticky-note me-2"></i>My Notes
                        </button>
                        <button class="lesson-tab" id="discussion-tab" data-bs-toggle="tab" data-bs-target="#discussion" type="button" role="tab">
                            <i class="fas fa-comments me-2"></i>Discussion
                        </button>
                    </nav>
                </div>
                
                <div class="tab-content">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <div class="lesson-content-area">
                            <h4 class="mb-3">About This Lesson</h4>
                            <div class="lesson-description mb-4">
                                {!! $lesson->content !!}
                            </div>
                            
                            <h5 class="mb-3">What You'll Learn</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Understanding JavaScript closures and their practical applications
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Mastering prototypal inheritance and the prototype chain
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Working with async/await for handling asynchronous operations
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-check text-success me-2"></i>
                                    Understanding the event loop and call stack
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Resources Tab -->
                    <div class="tab-pane fade" id="resources" role="tabpanel">
                        <div class="lesson-content-area">
                            <h4 class="mb-4">Lesson Resources</h4>
                            
                            @if(is_array($lesson->attachments) && count($lesson->attachments) > 0)
                                @foreach($lesson->attachments as $type => $filename)
                                    <div class="attachment-item">
                                        <div class="d-flex align-items-center">
                                            @if($type === 'slides')
                                                <i class="fas fa-file-powerpoint fa-2x text-danger me-3"></i>
                                            @elseif($type === 'code')
                                                <i class="fas fa-file-archive fa-2x text-warning me-3"></i>
                                            @else
                                                <i class="fas fa-file-pdf fa-2x text-danger me-3"></i>
                                            @endif
                                            <div>
                                                <h6 class="mb-1">{{ ucfirst($type) }} - {{ $filename }}</h6>
                                                <small class="text-muted">Click to download</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-download me-1"></i>Download
                                        </button>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No downloadable resources</h5>
                                    <p class="text-muted">All the content you need is included in the video lesson.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Notes Tab -->
                    <div class="tab-pane fade" id="notes" role="tabpanel">
                        <div class="lesson-content-area">
                            <h4 class="mb-3">My Personal Notes</h4>
                            <p class="text-muted mb-4">Take notes while watching the lesson. Your notes are automatically saved.</p>
                            
                            <div class="note-taking-area">
                                <textarea 
                                    class="form-control border-0 h-100" 
                                    placeholder="Start taking notes here..."
                                    id="lessonNotes"
                                    style="resize: vertical; min-height: 300px;"
                                >Key points from the lesson:

- Closures are functions that have access to outer scope
- Prototypal inheritance is different from classical inheritance
- Event loop manages asynchronous operations

Questions to ask:
- How does the call stack work with promises?
- Best practices for error handling in async functions</textarea>
                            </div>
                            
                            <div class="mt-3 text-end">
                                <button class="btn btn-primary" id="saveNotes">
                                    <i class="fas fa-save me-2"></i>Save Notes
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Discussion Tab -->
                    <div class="tab-pane fade" id="discussion" role="tabpanel">
                        <div class="lesson-content-area">
                            <h4 class="mb-4">Lesson Discussion</h4>
                            
                            <!-- Comment Form -->
                            <div class="mb-4">
                                <div class="d-flex">
                                    <img src="https://ui-avatars.com/api/?name=You&background=007bff&color=fff" 
                                         class="rounded-circle me-3" width="40" height="40" alt="Your Avatar">
                                    <div class="flex-grow-1">
                                        <textarea class="form-control mb-2" rows="3" placeholder="Ask a question or share your thoughts about this lesson..."></textarea>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-paper-plane me-1"></i>Post Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sample Comments -->
                            <div class="mb-4">
                                <div class="d-flex">
                                    <img src="https://ui-avatars.com/api/?name=Sarah+Johnson&background=28a745&color=fff" 
                                         class="rounded-circle me-3" width="40" height="40" alt="Sarah Johnson">
                                    <div class="flex-grow-1">
                                        <div class="bg-light p-3 rounded">
                                            <h6 class="mb-1">Sarah Johnson</h6>
                                            <p class="mb-1">Great explanation of closures! The practical examples really helped me understand the concept better.</p>
                                            <small class="text-muted">2 hours ago</small>
                                        </div>
                                        <div class="mt-2">
                                            <button class="btn btn-link btn-sm text-muted">
                                                <i class="fas fa-thumbs-up me-1"></i>5
                                            </button>
                                            <button class="btn btn-link btn-sm text-muted">
                                                <i class="fas fa-reply me-1"></i>Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="d-flex">
                                    <img src="https://ui-avatars.com/api/?name=Mike+Chen&background=dc3545&color=fff" 
                                         class="rounded-circle me-3" width="40" height="40" alt="Mike Chen">
                                    <div class="flex-grow-1">
                                        <div class="bg-light p-3 rounded">
                                            <h6 class="mb-1">Mike Chen</h6>
                                            <p class="mb-1">Could you provide more examples of when to use prototypal inheritance vs regular functions?</p>
                                            <small class="text-muted">5 hours ago</small>
                                        </div>
                                        <div class="mt-2">
                                            <button class="btn btn-link btn-sm text-muted">
                                                <i class="fas fa-thumbs-up me-1"></i>3
                                            </button>
                                            <button class="btn btn-link btn-sm text-muted">
                                                <i class="fas fa-reply me-1"></i>Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Instructor Info -->
            <div class="instructor-info">
                <div class="d-flex align-items-center">
                    <img src="{{ $lesson->course->instructor->image ?: 'https://ui-avatars.com/api/?name=' . urlencode($lesson->course->instructor->name) . '&background=ffffff&color=000000' }}" 
                         class="rounded-circle me-3" 
                         width="60" height="60" 
                         alt="{{ $lesson->course->instructor->name }}">
                    <div>
                        <h5 class="mb-1">{{ $lesson->course->instructor->name }}</h5>
                        <p class="mb-0 opacity-75">{{ $lesson->course->instructor->specialization }}</p>
                    </div>
                </div>
            </div>

            <!-- Course Lessons -->
            <div class="lesson-sidebar">
                <h5 class="mb-3">
                    <i class="fas fa-list me-2"></i>Course Content
                </h5>
                
                @foreach($courseLessons as $courseLesson)
                    <div class="lesson-list-item @if($courseLesson->sort_order === $lesson->sort_order) current @elseif($courseLesson->completed) completed @endif">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ $courseLesson->title }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-play-circle me-1"></i>{{ $courseLesson->duration }}
                                </small>
                            </div>
                            <div>
                                @if($courseLesson->completed)
                                    <i class="fas fa-check-circle text-success"></i>
                                @elseif($courseLesson->sort_order === $lesson->sort_order)
                                    <i class="fas fa-play-circle text-primary"></i>
                                @else
                                    <i class="far fa-circle text-muted"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="mt-3 pt-3 border-top">
                    <div class="d-flex justify-content-between text-muted">
                        <small>Progress:</small>
                        <small>{{ collect($courseLessons)->where('completed', true)->count() }}/{{ count($courseLessons) }} lessons</small>
                    </div>
                    <div class="progress mt-1" style="height: 6px;">
                        <div class="progress-bar bg-success" 
                             style="width: {{ (collect($courseLessons)->where('completed', true)->count() / count($courseLessons)) * 100 }}%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="lesson-sidebar">
                <h6 class="mb-3">Quick Actions</h6>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" id="markCompleted">
                        <i class="fas fa-check me-2"></i>Mark as Completed
                    </button>
                    <button class="btn btn-outline-warning">
                        <i class="fas fa-bookmark me-2"></i>Bookmark Lesson
                    </button>
                    <button class="btn btn-outline-info">
                        <i class="fas fa-share me-2"></i>Share Lesson
                    </button>
                </div>
                
                <hr>
                
                <div class="navigation-buttons">
                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-outline-secondary w-100" disabled>
                                <i class="fas fa-arrow-left me-1"></i>Previous
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-success w-100">
                                Next<i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to Course -->
<div class="bg-light py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="mb-2">{{ $lesson->course->title }}</h4>
                <p class="text-muted mb-0">Continue your learning journey with more lessons from this course.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('courses.single-1') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Course
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Progress tracking
    let progressPercentage = 60;
    const progressBar = document.getElementById('lessonProgress');
    
    // Simulate video progress (in a real app, this would track actual video progress)
    function updateProgress() {
        if (progressPercentage < 100) {
            progressPercentage += Math.random() * 5;
            progressBar.style.width = Math.min(progressPercentage, 100) + '%';
        }
    }
    
    // Update progress every 10 seconds (simulated)
    setInterval(updateProgress, 10000);
    
    // Mark as completed
    document.getElementById('markCompleted').addEventListener('click', function() {
        this.innerHTML = '<i class="fas fa-check me-2"></i>Completed!';
        this.classList.remove('btn-primary');
        this.classList.add('btn-success');
        this.disabled = true;
        
        progressBar.style.width = '100%';
        
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.innerHTML = '<div class="alert alert-success">Lesson marked as completed! 🎉</div>';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.remove();
        }, 3000);
    });
    
    // Auto-save notes
    const notesTextarea = document.getElementById('lessonNotes');
    let saveTimeout;
    
    notesTextarea.addEventListener('input', function() {
        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            // In a real app, this would save to the server
            console.log('Notes auto-saved');
        }, 2000);
    });
    
    // Manual save notes
    document.getElementById('saveNotes').addEventListener('click', function() {
        this.innerHTML = '<i class="fas fa-check me-2"></i>Saved!';
        this.classList.remove('btn-primary');
        this.classList.add('btn-success');
        
        setTimeout(() => {
            this.innerHTML = '<i class="fas fa-save me-2"></i>Save Notes';
            this.classList.remove('btn-success');
            this.classList.add('btn-primary');
        }, 2000);
    });
    
    // Tab switching
    const tabs = document.querySelectorAll('.lesson-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

// CSS for toast notification
const style = document.createElement('style');
style.textContent = `
    .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush
