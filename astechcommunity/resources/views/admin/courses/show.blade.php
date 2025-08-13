@extends('layouts.admin')

@section('title', 'Course Details')
@section('page-title', 'Course Details')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-start mb-3">
      <div>
        <h3 class="mb-1">{{ $course->title }}</h3>
        <div class="text-muted">{{ $course->category->name ?? '-' }} • {{ $course->level }}</div>
      </div>
      <div>
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <p>{!! nl2br(e($course->description)) !!}</p>
      </div>
      <div class="col-md-4">
        <dl class="row mb-0">
          <dt class="col-6">Instructor</dt>
          <dd class="col-6">{{ $course->instructor->name ?? '-' }}</dd>
          <dt class="col-6">Price</dt>
          <dd class="col-6">${{ number_format($course->final_price, 2) }}</dd>
          <dt class="col-6">Lessons</dt>
          <dd class="col-6">{{ $course->total_lessons }}</dd>
          <dt class="col-6">Status</dt>
          <dd class="col-6">{{ $course->is_active ? 'Active' : 'Inactive' }}</dd>
          <dt class="col-6">Featured</dt>
          <dd class="col-6">{{ $course->is_featured ? 'Yes' : 'No' }}</dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back</a>
    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" onsubmit="return confirm('Delete this course?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i> Delete</button>
    </form>
  </div>
</div>
@endsection


