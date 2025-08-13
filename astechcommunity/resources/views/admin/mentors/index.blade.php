@extends('layouts.admin')

@section('title', 'Mentors')
@section('page-title', 'Mentors')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">Mentors</h1>
  <a href="{{ route('admin.mentors.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Expertise</th><th>Rate</th><th>Verified</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($mentors as $mentor)
          <tr>
            <td>{{ $mentor->id }}</td>
            <td>{{ $mentor->name }}</td>
            <td>{{ $mentor->email }}</td>
            <td>{{ $mentor->expertise }}</td>
            <td>${{ number_format($mentor->session_rate, 2) }}</td>
            <td>{{ $mentor->is_verified ? 'Yes' : 'No' }}</td>
            <td class="text-right">
              <a href="{{ route('admin.mentors.show', $mentor) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.mentors.edit', $mentor) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center py-4">No mentors found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($mentors->hasPages())
    <div class="card-footer">{{ $mentors->links() }}</div>
  @endif
</div>
@endsection


