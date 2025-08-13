@extends('layouts.admin')

@section('title', 'Edit Charity Program')
@section('page-title', 'Edit Charity Program')

@section('content')
<form method="POST" action="{{ route('admin.charity.update', $program) }}">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <div class="form-group"><label>Title</label><input class="form-control" name="title" value="{{ old('title', $program->title) }}" required></div>
      <div class="form-group"><label>Description</label><textarea class="form-control" name="description" rows="5" required>{{ old('description', $program->description) }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Goal Amount</label><input type="number" step="0.01" min="0" name="goal_amount" value="{{ old('goal_amount', $program->goal_amount) }}" class="form-control" required></div>
        <div class="form-group col-md-6"><label>Current Amount</label><input type="number" step="0.01" min="0" name="current_amount" value="{{ old('current_amount', $program->current_amount) }}" class="form-control"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Start Date</label><input type="date" name="start_date" value="{{ old('start_date', optional($program->start_date)->format('Y-m-d')) }}" class="form-control" required></div>
        <div class="form-group col-md-6"><label>End Date</label><input type="date" name="end_date" value="{{ old('end_date', optional($program->end_date)->format('Y-m-d')) }}" class="form-control"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Beneficiary</label><input class="form-control" name="beneficiary" value="{{ old('beneficiary', $program->beneficiary) }}" required></div>
        <div class="form-group col-md-6"><label>Program Image</label><input type="file" class="form-control" name="program_image" accept="image/*"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $program->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Active</label></div></div>
        <div class="form-group col-md-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}><label class="form-check-label" for="is_featured">Featured</label></div></div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.charity.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Save Changes</button></div>
  </div>
</form>
@endsection


