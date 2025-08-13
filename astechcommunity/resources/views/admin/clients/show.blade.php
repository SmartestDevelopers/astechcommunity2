@extends('layouts.admin')

@section('title', 'Client Details')
@section('page-title', 'Client Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $client->company_name }}</h3>
    <div class="text-muted mb-3">{{ $client->industry }} • {{ $client->company_size ?? 'N/A' }}</div>
    <dl class="row mb-0">
      <dt class="col-4">Contact Person</dt><dd class="col-8">{{ $client->contact_person }}</dd>
      <dt class="col-4">Email</dt><dd class="col-8">{{ $client->email }}</dd>
      <dt class="col-4">Phone</dt><dd class="col-8">{{ $client->phone ?? '-' }}</dd>
      <dt class="col-4">Project Budget</dt><dd class="col-8">{{ $client->project_budget ? '$'.number_format($client->project_budget, 2) : '-' }}</dd>
      <dt class="col-4">Website</dt><dd class="col-8">{{ $client->website_url ?? '-' }}</dd>
      <dt class="col-4">Active</dt><dd class="col-8">{{ $client->is_active_client ? 'Yes' : 'No' }}</dd>
    </dl>
    <div class="mt-3"><strong>Requirements:</strong><br>{!! nl2br(e($client->requirements)) !!}</div>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


