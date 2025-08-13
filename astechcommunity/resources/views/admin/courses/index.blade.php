@extends('layouts.admin')

@section('title', 'Manage Courses')
@section('page-title', 'Courses Management')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
    <h1 class="admin-page-title">Courses</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Create Course</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Instructor</th>
              <th>Price</th>
              <th>Status</th>
              <th class="text-right">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($courses as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ optional($course->category)->name ?? '-' }}</td>
                <td>{{ optional($course->instructor)->name ?? '-' }}</td>
                <td>${{ number_format($course->final_price, 2) }}</td>
                <td>
                  <span class="badge {{ $course->is_active ? 'badge-success' : 'badge-secondary' }}">
                    {{ $course->is_active ? 'Active' : 'Inactive' }}
                  </span>
                </td>
                <td class="text-right">
                  <a class="btn btn-sm btn-info" href="{{ route('admin.courses.show', $course) }}"><i class="fas fa-eye"></i></a>
                  <a class="btn btn-sm btn-warning" href="{{ route('admin.courses.edit', $course) }}"><i class="fas fa-edit"></i></a>
                  <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="d-inline" onsubmit="return confirm('Delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center py-4">No courses found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    @if($courses->hasPages())
      <div class="card-footer">{{ $courses->links() }}</div>
    @endif
  </div>
@endsection


