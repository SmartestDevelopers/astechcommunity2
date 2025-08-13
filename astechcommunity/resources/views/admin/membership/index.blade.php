@extends('layouts.admin')

@section('title', 'Membership Plans')
@section('page-title', 'Membership Plans')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">Plans</h1>
  <a href="{{ route('admin.membership.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New Plan</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Name</th><th>Price</th><th>Duration</th><th>Status</th><th>Featured</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($plans as $plan)
          <tr>
            <td>{{ $plan->id }}</td>
            <td>{{ $plan->name }}</td>
            <td>${{ number_format($plan->price, 2) }}</td>
            <td>{{ $plan->duration_value }} {{ $plan->duration_type }}</td>
            <td><span class="badge {{ $plan->is_active ? 'badge-success' : 'badge-secondary' }}">{{ $plan->is_active ? 'Active' : 'Inactive' }}</span></td>
            <td>{{ $plan->is_featured ? 'Yes' : 'No' }}</td>
            <td class="text-right">
              <a href="{{ route('admin.membership.show', $plan) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.membership.edit', $plan) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center py-4">No plans found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($plans->hasPages())
    <div class="card-footer">{{ $plans->links() }}</div>
  @endif
</div>
@endsection


