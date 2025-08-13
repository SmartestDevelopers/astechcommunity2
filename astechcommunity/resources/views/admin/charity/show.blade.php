@extends('layouts.admin')

@section('title', 'Charity Program Details')
@section('page-title', 'Charity Program Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $program->title }}</h3>
    <div class="text-muted mb-3">Beneficiary: {{ $program->beneficiary }}</div>
    <dl class="row mb-0">
      <dt class="col-4">Goal</dt><dd class="col-8">${{ number_format($program->goal_amount, 2) }}</dd>
      <dt class="col-4">Raised</dt><dd class="col-8">${{ number_format($program->current_amount, 2) }}</dd>
      <dt class="col-4">Status</dt><dd class="col-8">{{ $program->is_active ? 'Active' : 'Inactive' }}</dd>
      <dt class="col-4">Featured</dt><dd class="col-8">{{ $program->is_featured ? 'Yes' : 'No' }}</dd>
      <dt class="col-4">Dates</dt><dd class="col-8">{{ optional($program->start_date)->format('Y-m-d') }} — {{ optional($program->end_date)->format('Y-m-d') ?? 'N/A' }}</dd>
    </dl>
    <div class="mt-3">{!! nl2br(e($program->description)) !!}</div>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.charity.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.charity.edit', $program) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


