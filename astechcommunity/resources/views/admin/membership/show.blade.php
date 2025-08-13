@extends('layouts.admin')

@section('title', 'Plan Details')
@section('page-title', 'Membership Plan Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $plan->name }}</h3>
    <div class="text-muted mb-3">${{ number_format($plan->price, 2) }} • {{ $plan->duration_value }} {{ $plan->duration_type }}</div>
    <p class="mb-3">{!! nl2br(e($plan->description)) !!}</p>
    <dl class="row mb-0">
      <dt class="col-4">Active</dt><dd class="col-8">{{ $plan->is_active ? 'Yes' : 'No' }}</dd>
      <dt class="col-4">Featured</dt><dd class="col-8">{{ $plan->is_featured ? 'Yes' : 'No' }}</dd>
      <dt class="col-4">Max Members</dt><dd class="col-8">{{ $plan->max_members ?? '-' }}</dd>
    </dl>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.membership.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.membership.edit', $plan) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


