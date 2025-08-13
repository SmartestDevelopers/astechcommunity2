@extends('layouts.admin')

@section('title', 'Create New Blog Post')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <h1 class="admin-page-title">Create Blog Post</h1>
  <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i> Back</a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Post Title *</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
              @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Excerpt</label>
              <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Short summary">{{ old('excerpt') }}</textarea>
              @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Content *</label>
              <textarea name="content" rows="12" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
              @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Tags</label>
              <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" placeholder="tag1, tag2" value="{{ old('tags') }}">
              @error('tags')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
              <label>Featured Image</label>
              <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
              @error('featured_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="card-footer d-flex justify-content-end px-0">
              <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary mr-2">Cancel</a>
              <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label>Publish Date</label>
            <input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at') }}">
            @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          <div class="form-group mb-0">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
              <label class="custom-control-label" for="is_published">Publish immediately</label>
            </div>
            <small class="text-muted">Uncheck to save as draft</small>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
