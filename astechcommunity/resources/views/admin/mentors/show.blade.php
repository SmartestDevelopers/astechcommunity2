@extends('layouts.admin')

@section('title', 'Mentor Details')
@section('page-title', 'Mentor Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $mentor->name }}</h3>
    <div class="text-muted mb-3">{{ $mentor->email }} • {{ $mentor->expertise }}</div>
    <dl class="row mb-0">
      <dt class="col-4">Experience</dt><dd class="col-8">{{ $mentor->experience_years }} years</dd>
      <dt class="col-4">Session Rate</dt><dd class="col-8">${{ number_format($mentor->session_rate, 2) }}</dd>
      <dt class="col-4">Accepting Sessions</dt><dd class="col-8">{{ $mentor->is_accepting_sessions ? 'Yes' : 'No' }}</dd>
      <dt class="col-4">Verified</dt><dd class="col-8">{{ $mentor->is_verified ? 'Yes' : 'No' }}</dd>
    </dl>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.mentors.edit', $mentor) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


