@extends('layouts.admin')

@section('title', 'Add New Service')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <h1 class="admin-page-title">Add New Service</h1>
  <a href="{{ route('admin.services.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i> Back</a>
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
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row y-gap-20">
                        <!-- Service Title -->
                        <div class="col-12">
                            <div class="form-group">
                                <label>Service Title *</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       placeholder="Enter service title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Category and Price -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category *</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                    <option value="">Select Category</option>
                                    <option value="Web Development" {{ old('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="Mobile Development" {{ old('category') == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                                    <option value="UI/UX Design" {{ old('category') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Digital Marketing" {{ old('category') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                    <option value="Consulting" {{ old('category') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="Training" {{ old('category') == 'Training' ? 'selected' : '' }}>Training</option>
                                    <option value="Support" {{ old('category') == 'Support' ? 'selected' : '' }}>Support</option>
                                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price (USD) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                                           placeholder="0.00" step="0.01" min="0" value="{{ old('price') }}" required>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration *</label>
                                <select name="duration" class="form-control @error('duration') is-invalid @enderror" required>
                                    <option value="">Select Duration</option>
                                    <option value="1-2 days" {{ old('duration') == '1-2 days' ? 'selected' : '' }}>1-2 days</option>
                                    <option value="3-7 days" {{ old('duration') == '3-7 days' ? 'selected' : '' }}>3-7 days</option>
                                    <option value="1-2 weeks" {{ old('duration') == '1-2 weeks' ? 'selected' : '' }}>1-2 weeks</option>
                                    <option value="2-4 weeks" {{ old('duration') == '2-4 weeks' ? 'selected' : '' }}>2-4 weeks</option>
                                    <option value="1-2 months" {{ old('duration') == '1-2 months' ? 'selected' : '' }}>1-2 months</option>
                                    <option value="3-6 months" {{ old('duration') == '3-6 months' ? 'selected' : '' }}>3-6 months</option>
                                    <option value="6+ months" {{ old('duration') == '6+ months' ? 'selected' : '' }}>6+ months</option>
                                    <option value="Ongoing" {{ old('duration') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                </select>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="custom-control custom-switch mt-1">
                                    <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" 
                                           value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_active">
                                        Active (Service is available for booking)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Featured Image</label>
                                 <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                                 <small class="text-muted">Upload service image (JPG, PNG, GIF, WEBP)</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" 
                                       placeholder="e.g., responsive, mobile-friendly, seo" value="{{ old('tags') }}">
                                <small class="text-muted">Separate tags with commas</small>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description *</label>
                                <textarea name="description" rows="6" class="form-control @error('description') is-invalid @enderror" 
                                          placeholder="Describe your service in detail..." required>{{ old('description') }}</textarea>
                                <small class="text-muted">Provide a comprehensive description of what this service includes</small>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="col-12">
                            <div class="card-footer d-flex justify-content-end px-0">
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Service</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-generate slug from title if needed
document.querySelector('input[name="title"]').addEventListener('input', function() {
    // You can add slug generation logic here if needed
});

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
</script>
@endsection
