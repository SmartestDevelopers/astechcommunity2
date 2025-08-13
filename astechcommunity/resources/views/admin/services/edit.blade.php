@extends('layouts.front')

@section('title', 'Edit Service - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex items-center mb-30">
                <a href="{{ route('admin.services.show', $service) }}" class="button -sm -outline-purple-1 text-purple-1 mr-20">
                    <i class="icon-arrow-left mr-10"></i>Back to Service
                </a>
                <div>
                    <h1 class="text-30 lh-15 fw-700">Edit Service</h1>
                    <p class="text-15 text-dark-1">Update service information</p>
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
        <div class="col-12">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row y-gap-20">
                        <!-- Service Title -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Service Title *</label>
                                <input type="text" name="title" class="form-control -md @error('title') is-invalid @enderror" 
                                       placeholder="Enter service title" value="{{ old('title', $service->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Category and Price -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Category *</label>
                                <select name="category" class="form-control -md @error('category') is-invalid @enderror" required>
                                    <option value="">Select Category</option>
                                    <option value="Web Development" {{ old('category', $service->category) == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="Mobile Development" {{ old('category', $service->category) == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                                    <option value="UI/UX Design" {{ old('category', $service->category) == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Digital Marketing" {{ old('category', $service->category) == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                    <option value="Consulting" {{ old('category', $service->category) == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="Training" {{ old('category', $service->category) == 'Training' ? 'selected' : '' }}>Training</option>
                                    <option value="Support" {{ old('category', $service->category) == 'Support' ? 'selected' : '' }}>Support</option>
                                    <option value="Other" {{ old('category', $service->category) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Price (USD) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" class="form-control -md @error('price') is-invalid @enderror" 
                                           placeholder="0.00" step="0.01" min="0" value="{{ old('price', $service->price) }}" required>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Duration *</label>
                                <select name="duration" class="form-control -md @error('duration') is-invalid @enderror" required>
                                    <option value="">Select Duration</option>
                                    <option value="1-2 days" {{ old('duration', $service->duration) == '1-2 days' ? 'selected' : '' }}>1-2 days</option>
                                    <option value="3-7 days" {{ old('duration', $service->duration) == '3-7 days' ? 'selected' : '' }}>3-7 days</option>
                                    <option value="1-2 weeks" {{ old('duration', $service->duration) == '1-2 weeks' ? 'selected' : '' }}>1-2 weeks</option>
                                    <option value="2-4 weeks" {{ old('duration', $service->duration) == '2-4 weeks' ? 'selected' : '' }}>2-4 weeks</option>
                                    <option value="1-2 months" {{ old('duration', $service->duration) == '1-2 months' ? 'selected' : '' }}>1-2 months</option>
                                    <option value="3-6 months" {{ old('duration', $service->duration) == '3-6 months' ? 'selected' : '' }}>3-6 months</option>
                                    <option value="6+ months" {{ old('duration', $service->duration) == '6+ months' ? 'selected' : '' }}>6+ months</option>
                                    <option value="Ongoing" {{ old('duration', $service->duration) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                </select>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Status</label>
                                <div class="form-check form-switch mt-10">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" 
                                           value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Service is available for booking)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Featured Image</label>
                                 <input type="file" name="featured_image" class="form-control -md @error('featured_image') is-invalid @enderror" accept="image/*">
                                 <small class="text-13 text-dark-1">Upload a new image to replace current one</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($service->featured_image)
                                    <div class="mt-10">
                                        <small class="text-13 text-green-1">
                                            <i class="icon-check mr-5"></i>Current image: 
                                            <a href="{{ $service->featured_image }}" target="_blank" class="text-purple-1">View Image</a>
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Tags</label>
                                <input type="text" name="tags" class="form-control -md @error('tags') is-invalid @enderror" 
                                       placeholder="e.g., responsive, mobile-friendly, seo" value="{{ old('tags', $service->tags) }}">
                                <small class="text-13 text-dark-1">Separate tags with commas</small>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Description *</label>
                                <textarea name="description" rows="6" class="form-control -md @error('description') is-invalid @enderror" 
                                          placeholder="Describe your service in detail..." required>{{ old('description', $service->description) }}</textarea>
                                <small class="text-13 text-dark-1">Provide a comprehensive description of what this service includes</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Service Metadata Info -->
                        <div class="col-12">
                            <div class="bg-light rounded-8 px-20 py-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-13 text-dark-1">
                                            <strong>Service ID:</strong> #{{ $service->id }}
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <small class="text-13 text-dark-1">
                                            <strong>Created:</strong> {{ $service->created_at->format('M d, Y H:i') }}
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <small class="text-13 text-dark-1">
                                            <strong>Last Updated:</strong> {{ $service->updated_at->format('M d, Y H:i') }}
                                        </small>
                                    </div>
                                    <div class="col-md-6 mt-5">
                                        <small class="text-13 text-dark-1">
                                            <strong>Current Status:</strong> 
                                            <span class="badge {{ $service->is_active ? '-green-1 text-green-1' : '-red-1 text-red-1' }} text-11">
                                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="col-12">
                            <div class="d-flex justify-between items-center pt-20 border-top-light">
                                <div class="text-14 text-dark-1">
                                    <i class="icon-info-circle mr-5"></i>
                                    Fields marked with * are required
                                </div>
                                <div class="d-flex x-gap-15">
                                    <a href="{{ route('admin.services.show', $service) }}" class="button -md -outline-dark-1 text-dark-1">
                                        Cancel
                                    </a>
                                    <button type="submit" class="button -md -green-1 text-white">
                                        <i class="icon-save mr-10"></i>Update Service
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Preview Current Service (if image exists) -->
    @if($service->featured_image)
        <div class="row mt-30">
            <div class="col-12">
                <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                    <h5 class="text-18 fw-500 mb-20">Current Service Preview</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" 
                                 class="w-100 rounded-8" style="max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-16 fw-500 mb-10">{{ $service->title }}</h6>
                            <div class="d-flex items-center x-gap-15 mb-15">
                                <span class="badge -purple-1 text-purple-1 text-11">{{ $service->category }}</span>
                                <span class="text-14 fw-500 text-green-1">${{ number_format($service->price, 2) }}</span>
                                <span class="text-14 text-dark-1">{{ $service->duration }}</span>
                            </div>
                            <p class="text-14 text-dark-1">{{ Str::limit($service->description, 150) }}</p>
                            @if($service->tags)
                                <div class="d-flex flex-wrap x-gap-5 y-gap-5 mt-10">
                                    @foreach(array_slice(explode(',', $service->tags), 0, 3) as $tag)
                                        <span class="badge -outline-purple-1 text-purple-1 text-11">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const title = document.querySelector('input[name="title"]').value.trim();
    const category = document.querySelector('select[name="category"]').value;
    const price = document.querySelector('input[name="price"]').value;
    const duration = document.querySelector('select[name="duration"]').value;
    const description = document.querySelector('textarea[name="description"]').value.trim();

    if (!title || !category || !price || !duration || !description) {
        e.preventDefault();
        alert('Please fill in all required fields.');
        return false;
    }

    if (parseFloat(price) < 0) {
        e.preventDefault();
        alert('Price must be a positive number.');
        return false;
    }
});

// Real-time image preview
document.querySelector('input[name="featured_image"]').addEventListener('blur', function() {
    const imageUrl = this.value.trim();
    const previewContainer = document.getElementById('image-preview');
    
    if (imageUrl && (imageUrl.startsWith('http://') || imageUrl.startsWith('https://'))) {
        // You can add image preview logic here if needed
        console.log('Image URL updated:', imageUrl);
    }
});

// Auto-save draft functionality (optional)
let autoSaveTimer;
function autoSave() {
    clearTimeout(autoSaveTimer);
    autoSaveTimer = setTimeout(function() {
        // You can implement auto-save draft functionality here
        console.log('Auto-saving draft...');
    }, 5000);
}

document.querySelectorAll('input, textarea, select').forEach(function(element) {
    element.addEventListener('input', autoSave);
});
</script>
@endsection
