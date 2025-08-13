@extends('layouts.admin')

@section('title', 'Edit Client')
@section('page-title', 'Edit Client')

@section('content')
<form method="POST" action="{{ route('admin.clients.update', $client) }}">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6"><label>Company Name</label><input class="form-control" name="company_name" value="{{ old('company_name', $client->company_name) }}" required></div>
        <div class="form-group col-md-6"><label>Contact Person</label><input class="form-control" name="contact_person" value="{{ old('contact_person', $client->contact_person) }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Email</label><input type="email" class="form-control" name="email" value="{{ old('email', $client->email) }}" required></div>
        <div class="form-group col-md-6"><label>Phone</label><input class="form-control" name="phone" value="{{ old('phone', $client->phone) }}"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Industry</label><input class="form-control" name="industry" value="{{ old('industry', $client->industry) }}" required></div>
        <div class="form-group col-md-6"><label>Company Size</label><input class="form-control" name="company_size" value="{{ old('company_size', $client->company_size) }}"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Project Budget</label><input type="number" step="0.01" min="0" class="form-control" name="project_budget" value="{{ old('project_budget', $client->project_budget) }}"></div>
        <div class="form-group col-md-6"><label>Website</label><input class="form-control" name="website_url" value="{{ old('website_url', $client->website_url) }}"></div>
      </div>
      <div class="form-group"><label>Requirements</label><textarea class="form-control" name="requirements" rows="4">{{ old('requirements', $client->requirements) }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Company Logo</label><input type="file" class="form-control" name="company_logo" accept="image/*"></div>
        <div class="form-group col-md-6"><label>Partnership Type</label><input class="form-control" name="partnership_type" value="{{ old('partnership_type', $client->partnership_type) }}"></div>
      </div>
      <div class="form-check"><input class="form-check-input" type="checkbox" name="is_active_client" id="is_active_client" {{ old('is_active_client', $client->is_active_client) ? 'checked' : '' }}><label class="form-check-label" for="is_active_client">Active</label></div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.clients.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Save Changes</button></div>
  </div>
</form>
@endsection


