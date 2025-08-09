@extends('layouts.front')

@section('title', 'Create New Blog Post - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex items-center mb-30">
                <a href="{{ route('admin.blog.index') }}" class="button -sm -outline-green-1 text-green-1 mr-20">
                    <i class="icon-arrow-left mr-10"></i>Back to Blog Posts
                </a>
                <div>
                    <h1 class="text-30 lh-15 fw-700">Create New Blog Post</h1>
                    <p class="text-15 text-dark-1">Write and publish a new blog article</p>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6 class="fw-500 mb-10">Please fix the following errors:</h6>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row y-gap-20">
                        <!-- Blog Title -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Post Title *</label>
                                <input type="text" name="title" class="form-control -md @error('title') is-invalid @enderror" 
                                       placeholder="Enter blog post title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Excerpt</label>
                                <textarea name="excerpt" rows="3" class="form-control -md @error('excerpt') is-invalid @enderror" 
                                          placeholder="Brief summary of the blog post (optional)">{{ old('excerpt') }}</textarea>
                                <small class="text-13 text-dark-1">A short summary that will appear in blog listings</small>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Content *</label>
                                <textarea name="content" rows="15" class="form-control -md @error('content') is-invalid @enderror" 
                                          placeholder="Write your blog post content here..." required>{{ old('content') }}</textarea>
                                <small class="text-13 text-dark-1">Full content of your blog post. You can use HTML formatting.</small>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Tags</label>
                                <input type="text" name="tags" class="form-control -md @error('tags') is-invalid @enderror" 
                                       placeholder="e.g., web development, javascript, tutorial" value="{{ old('tags') }}">
                                <small class="text-13 text-dark-1">Separate tags with commas</small>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Featured Image</label>
                                <input type="text" name="featured_image" class="form-control -md @error('featured_image') is-invalid @enderror" 
                                       placeholder="Image URL (https://...)" value="{{ old('featured_image') }}">
                                <small class="text-13 text-dark-1">Enter the full URL to the featured image</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Publish Box -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30 mb-30">
                <h5 class="text-18 fw-500 mb-20">Publish</h5>
                
                <div class="y-gap-20">
                    <!-- Author -->
                    <div class="form-group">
                        <label class="text-14 fw-500 text-dark-1 mb-10">Author *</label>
                        <input type="text" name="author" form="blog-form" class="form-control -sm @error('author') is-invalid @enderror" 
                               placeholder="Author name" value="{{ old('author', auth()->user()->name ?? '') }}" required>
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label class="text-14 fw-500 text-dark-1 mb-10">Category *</label>
                        <select name="category" form="blog-form" class="form-control -sm @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                            <option value="Web Development" {{ old('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            <option value="Mobile Development" {{ old('category') == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                            <option value="AI & Machine Learning" {{ old('category') == 'AI & Machine Learning' ? 'selected' : '' }}>AI & Machine Learning</option>
                            <option value="Career" {{ old('category') == 'Career' ? 'selected' : '' }}>Career</option>
                            <option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Business</option>
                            <option value="Tutorials" {{ old('category') == 'Tutorials' ? 'selected' : '' }}>Tutorials</option>
                            <option value="News" {{ old('category') == 'News' ? 'selected' : '' }}>News</option>
                            <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publish Date -->
                    <div class="form-group">
                        <label class="text-14 fw-500 text-dark-1 mb-10">Publish Date</label>
                        <input type="datetime-local" name="published_at" form="blog-form" class="form-control -sm @error('published_at') is-invalid @enderror" 
                               value="{{ old('published_at') }}">
                        <small class="text-12 text-dark-1">Leave empty to publish immediately</small>
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_published" form="blog-form" class="form-check-input" id="is_published" 
                                   value="1" {{ old('is_published') ? 'checked' : '' }}>
                            <label class="form-check-label text-14" for="is_published">
                                Publish immediately
                            </label>
                        </div>
                        <small class="text-12 text-dark-1">Uncheck to save as draft</small>
                    </div>

                    <div class="border-top-light pt-20">
                        <div class="d-flex flex-column y-gap-10">
                            <button type="submit" form="blog-form" class="button -sm -green-1 text-white">
                                <i class="icon-save mr-10"></i>Create Post
                            </button>
                            <a href="{{ route('admin.blog.index') }}" class="button -sm -outline-dark-1 text-dark-1">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Writing Tips -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30">
                <h6 class="text-16 fw-500 mb-15">Writing Tips</h6>
                <div class="y-gap-10">
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <small class="text-13 text-dark-1">Use clear, engaging headlines</small>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <small class="text-13 text-dark-1">Include relevant images and examples</small>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <small class="text-13 text-dark-1">Break content into digestible sections</small>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <small class="text-13 text-dark-1">Add relevant tags for better discovery</small>
                    </div>
                    <div class="d-flex items-start x-gap-10">
                        <i class="icon-check text-14 text-green-1 mt-2"></i>
                        <small class="text-13 text-dark-1">Proofread before publishing</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add form ID to the main form
document.querySelector('form').setAttribute('id', 'blog-form');

// Auto-generate slug from title
document.querySelector('input[name="title"]').addEventListener('input', function() {
    // You can add slug generation logic here if needed
});

// Form validation
document.querySelector('#blog-form').addEventListener('submit', function(e) {
    const title = document.querySelector('input[name="title"]').value.trim();
    const content = document.querySelector('textarea[name="content"]').value.trim();
    const author = document.querySelector('input[name="author"]').value.trim();
    const category = document.querySelector('select[name="category"]').value;

    if (!title || !content || !author || !category) {
        e.preventDefault();
        alert('Please fill in all required fields (Title, Content, Author, Category).');
        return false;
    }

    if (title.length < 10) {
        e.preventDefault();
        alert('Title should be at least 10 characters long.');
        return false;
    }

    if (content.length < 50) {
        e.preventDefault();
        alert('Content should be at least 50 characters long.');
        return false;
    }
});

// Auto-save draft functionality (optional)
let autoSaveTimer;
function autoSave() {
    clearTimeout(autoSaveTimer);
    autoSaveTimer = setTimeout(function() {
        // You can implement auto-save draft functionality here
        console.log('Auto-saving draft...');
    }, 30000); // Auto-save every 30 seconds
}

document.querySelectorAll('#blog-form input, #blog-form textarea, #blog-form select').forEach(function(element) {
    element.addEventListener('input', autoSave);
});

// Character counter for content
const contentTextarea = document.querySelector('textarea[name="content"]');
const charCountDisplay = document.createElement('small');
charCountDisplay.className = 'text-12 text-dark-1 mt-5 d-block';
contentTextarea.parentNode.appendChild(charCountDisplay);

contentTextarea.addEventListener('input', function() {
    const charCount = this.value.length;
    charCountDisplay.textContent = `${charCount} characters`;
    
    if (charCount < 50) {
        charCountDisplay.className = 'text-12 text-red-1 mt-5 d-block';
    } else if (charCount < 200) {
        charCountDisplay.className = 'text-12 text-orange-1 mt-5 d-block';
    } else {
        charCountDisplay.className = 'text-12 text-green-1 mt-5 d-block';
    }
});
</script>
@endsection
