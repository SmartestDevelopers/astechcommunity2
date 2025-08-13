@extends('layouts.admin')

@section('title', 'Create Mentor')
@section('page-title', 'Create Mentor')

@section('content')
<form method="POST" action="{{ route('admin.mentors.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-6"><label>Name</label><input class="form-control" name="name" value="{{ old('name') }}" required></div>
        <div class="form-group col-md-6"><label>Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Expertise</label><input class="form-control" name="expertise" value="{{ old('expertise') }}" required></div>
        <div class="form-group col-md-6"><label>Experience (years)</label><input type="number" min="0" class="form-control" name="experience_years" value="{{ old('experience_years', 0) }}" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Session Rate</label><input type="number" step="0.01" min="0" class="form-control" name="session_rate" value="{{ old('session_rate', 0) }}" required></div>
        <div class="form-group col-md-6"><label>Availability Hours</label><input class="form-control" name="availability_hours" value="{{ old('availability_hours') }}"></div>
      </div>
      <div class="form-group"><label>Bio</label><textarea class="form-control" name="bio" rows="4">{{ old('bio') }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>LinkedIn</label><input class="form-control" name="linkedin_profile" value="{{ old('linkedin_profile') }}"></div>
        <div class="form-group col-md-6"><label>Profile Image</label><input type="file" class="form-control" name="profile_image" accept="image/*"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_accepting_sessions" id="is_accepting_sessions" {{ old('is_accepting_sessions', true) ? 'checked' : '' }}><label class="form-check-label" for="is_accepting_sessions">Accepting Sessions</label></div></div>
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_verified" id="is_verified" {{ old('is_verified') ? 'checked' : '' }}><label class="form-check-label" for="is_verified">Verified</label></div></div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.mentors.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection


