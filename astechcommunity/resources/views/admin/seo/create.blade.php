@extends('layouts.admin')

@section('title', 'Create SEO Page')
@section('page-title', 'Create SEO Page')

@section('content')
<form method="POST" action="{{ route('admin.seo.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-group"><label>Page Name</label><input class="form-control" name="page_name" value="{{ old('page_name') }}" required></div>
      <div class="form-group"><label>Page URL</label><input class="form-control" name="page_url" value="{{ old('page_url') }}" required></div>
      <div class="form-group"><label>Meta Title</label><input class="form-control" name="meta_title" value="{{ old('meta_title') }}" required></div>
      <div class="form-group"><label>Meta Description</label><textarea class="form-control" rows="3" name="meta_description">{{ old('meta_description') }}</textarea></div>
      <div class="form-group"><label>Meta Keywords</label><input class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}"></div>
      <div class="form-row">
        <div class="form-group col-md-4"><label>OG Title</label><input class="form-control" name="og_title" value="{{ old('og_title') }}"></div>
        <div class="form-group col-md-4"><label>OG Description</label><input class="form-control" name="og_description" value="{{ old('og_description') }}"></div>
        <div class="form-group col-md-4"><label>OG Image</label><input type="file" class="form-control" name="og_image" accept="image/*"></div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Canonical URL</label><input class="form-control" name="canonical_url" value="{{ old('canonical_url') }}"></div>
        <div class="form-group col-md-6"><label>Robots</label><input class="form-control" name="robots" value="{{ old('robots') }}" placeholder="index, follow"></div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.seo.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection


