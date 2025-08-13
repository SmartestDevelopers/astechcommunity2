@extends('layouts.admin')

@section('title', 'Edit Course')
@section('page-title', 'Edit Course')

@section('content')
<form method="POST" action="{{ route('admin.courses.update', $course) }}">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $course->title) }}" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="6" required>{{ old('description', $course->description) }}</textarea>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Instructor</label>
          <select name="instructor_id" class="form-control" required>
            @foreach($instructors as $instructor)
              <option value="{{ $instructor->id }}" {{ old('instructor_id', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>{{ $instructor->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Category</label>
          <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Price</label>
          <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $course->price) }}" class="form-control" required>
        </div>
        <div class="form-group col-md-4">
          <label>Discount Price</label>
          <input type="number" step="0.01" min="0" name="discount_price" value="{{ old('discount_price', $course->discount_price) }}" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label>Level</label>
          <select name="level" class="form-control" required>
            @foreach(['Beginner','Intermediate','Advanced'] as $level)
              <option value="{{ $level }}" {{ old('level', $course->level) == $level ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label>Duration (Hours)</label>
          <input type="number" min="0" name="duration_hours" value="{{ old('duration_hours', $course->duration_hours) }}" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label>Duration (Minutes)</label>
          <input type="number" min="0" max="59" name="duration_minutes" value="{{ old('duration_minutes', $course->duration_minutes) }}" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label>Total Lessons</label>
          <input type="number" min="0" name="total_lessons" value="{{ old('total_lessons', $course->total_lessons) }}" class="form-control">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Course Image</label>
          <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="form-group col-md-6">
          <label>Video URL</label>
          <input type="text" name="video_url" value="{{ old('video_url', $course->video_url) }}" class="form-control">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
          </div>
        </div>
        <div class="form-group col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $course->is_featured) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Featured</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $course->meta_title) }}" class="form-control">
      </div>
      <div class="form-group">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $course->meta_description) }}</textarea>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary mr-2">Cancel</a>
      <button type="submit" class="btn btn-primary">Update Course</button>
    </div>
  </div>
</form>
@endsection


