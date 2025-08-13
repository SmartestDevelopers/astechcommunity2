@extends('layouts.admin')

@section('title', 'Freelancer Details')
@section('page-title', 'Freelancer Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $freelancer->name }}</h3>
    <div class="text-muted mb-3">{{ $freelancer->email }} • {{ $freelancer->experience_level }}</div>
    <dl class="row mb-0">
      <dt class="col-4">Skills</dt><dd class="col-8">{{ $freelancer->skills }}</dd>
      <dt class="col-4">Hourly Rate</dt><dd class="col-8">${{ number_format($freelancer->hourly_rate, 2) }}</dd>
      <dt class="col-4">Availability</dt><dd class="col-8">{{ $freelancer->availability }}</dd>
      <dt class="col-4">Verified</dt><dd class="col-8">{{ $freelancer->is_verified ? 'Yes' : 'No' }}</dd>
    </dl>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.freelancers.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.freelancers.edit', $freelancer) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


