@extends('layouts.admin')

@section('title', 'Create Plan')
@section('page-title', 'Create Membership Plan')

@section('content')
<form method="POST" action="{{ route('admin.membership.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-group"><label>Name</label><input class="form-control" name="name" value="{{ old('name') }}" required></div>
      <div class="form-group"><label>Description</label><textarea class="form-control" name="description" rows="5" required>{{ old('description') }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-4"><label>Price</label><input type="number" step="0.01" min="0" name="price" value="{{ old('price', 0) }}" class="form-control" required></div>
        <div class="form-group col-md-4"><label>Duration Type</label><select name="duration_type" class="form-control"><option>days</option><option>months</option><option>years</option></select></div>
        <div class="form-group col-md-4"><label>Duration Value</label><input type="number" min="1" name="duration_value" value="{{ old('duration_value', 1) }}" class="form-control" required></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Features (JSON)</label><textarea name="features" class="form-control" rows="3">{{ old('features') }}</textarea></div>
        <div class="form-group col-md-6"><label>Max Members</label><input type="number" min="1" name="max_members" value="{{ old('max_members') }}" class="form-control"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Active</label></div></div>
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}><label class="form-check-label" for="is_featured">Featured</label></div></div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.membership.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection


