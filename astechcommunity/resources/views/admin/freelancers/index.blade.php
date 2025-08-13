@extends('layouts.admin')

@section('title', 'Freelancers')
@section('page-title', 'Freelancers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">Freelancers</h1>
  <a href="{{ route('admin.freelancers.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Skills</th><th>Rate</th><th>Verified</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($freelancers as $freelancer)
          <tr>
            <td>{{ $freelancer->id }}</td>
            <td>{{ $freelancer->name }}</td>
            <td>{{ $freelancer->email }}</td>
            <td>{{ Str::limit(is_array($freelancer->skills) ? implode(', ', $freelancer->skills) : (string) $freelancer->skills, 40) }}</td>
            <td>${{ number_format($freelancer->hourly_rate, 2) }}</td>
            <td>{{ $freelancer->is_verified ? 'Yes' : 'No' }}</td>
            <td class="text-right">
              <a href="{{ route('admin.freelancers.show', $freelancer) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.freelancers.edit', $freelancer) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center py-4">No freelancers found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($freelancers->hasPages())
    <div class="card-footer">{{ $freelancers->links() }}</div>
  @endif
</div>
@endsection


