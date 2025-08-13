@extends('layouts.admin')

@section('title', 'Create Freelancer')
@section('page-title', 'Create Freelancer')

@section('content')
<form method="POST" action="{{ route('admin.freelancers.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6"><label>Name</label><input class="form-control" name="name" value="{{ old('name') }}" required></div>
        <div class="form-group col-md-6"><label>Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Phone</label><input class="form-control" name="phone" value="{{ old('phone') }}"></div>
        <div class="form-group col-md-6"><label>Hourly Rate</label><input type="number" step="0.01" min="0" class="form-control" name="hourly_rate" value="{{ old('hourly_rate', 0) }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Skills</label><input class="form-control" name="skills" value="{{ old('skills') }}" required></div>
        <div class="form-group col-md-6"><label>Experience Level</label><input class="form-control" name="experience_level" value="{{ old('experience_level') }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Availability</label><input class="form-control" name="availability" value="{{ old('availability') }}" required></div>
        <div class="form-group col-md-6"><label>Portfolio URL</label><input class="form-control" name="portfolio_url" value="{{ old('portfolio_url') }}"></div>
      </div>
      <div class="form-group"><label>Bio</label><textarea class="form-control" name="bio" rows="4">{{ old('bio') }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Profile Image</label><input type="file" class="form-control" name="profile_image" accept="image/*"></div>
        <div class="form-group col-md-3"><div class="form-check mt-4"><input class="form-check-input" type="checkbox" name="is_verified" id="is_verified" {{ old('is_verified') ? 'checked' : '' }}><label class="form-check-label" for="is_verified">Verified</label></div></div>
        <div class="form-group col-md-3"><div class="form-check mt-4"><input class="form-check-input" type="checkbox" name="is_available" id="is_available" {{ old('is_available', true) ? 'checked' : '' }}><label class="form-check-label" for="is_available">Available</label></div></div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.freelancers.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection


