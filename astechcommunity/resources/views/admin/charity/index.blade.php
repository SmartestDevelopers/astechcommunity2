@extends('layouts.admin')

@section('title', 'Charity Programs')
@section('page-title', 'Charity Programs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">Programs</h1>
  <a href="{{ route('admin.charity.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Title</th><th>Goal</th><th>Raised</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($programs as $program)
          <tr>
            <td>{{ $program->id }}</td>
            <td>{{ $program->title }}</td>
            <td>${{ number_format($program->goal_amount, 2) }}</td>
            <td>${{ number_format($program->current_amount, 2) }}</td>
            <td>{{ $program->is_active ? 'Active' : 'Inactive' }}</td>
            <td class="text-right">
              <a href="{{ route('admin.charity.show', $program) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.charity.edit', $program) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center py-4">No programs found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($programs->hasPages())
    <div class="card-footer">{{ $programs->links() }}</div>
  @endif
</div>
@endsection


