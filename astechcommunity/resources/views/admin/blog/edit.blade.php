@extends('layouts.admin')

@section('title', 'Edit Blog Post')
@section('page-title', 'Edit Blog Post')

@section('content')
<form method="POST" action="{{ route('admin.blog.update', $post) }}">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <div class="form-group"><label>Title</label><input class="form-control" name="title" value="{{ old('title', $post->title) }}" required></div>
      <div class="form-group"><label>Content</label><textarea class="form-control" rows="8" name="content" required>{{ old('content', $post->content) }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-4"><label>Author</label><input class="form-control" name="author" value="{{ old('author', $post->author) }}" required></div>
        <div class="form-group col-md-4"><label>Category</label><input class="form-control" name="category" value="{{ old('category', $post->category) }}" required></div>
        <div class="form-group col-md-4"><label>Published At</label><input type="datetime-local" class="form-control" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"></div>
      </div>
        <div class="form-row">
        <div class="form-group col-md-6"><label>Featured Image</label><input class="form-control" name="featured_image" value="{{ old('featured_image', $post->featured_image) }}"></div>
        <div class="form-group col-md-6"><label>Tags (comma separated)</label><input class="form-control" name="tags" value="{{ old('tags', $post->tags) }}"></div>
      </div>
        <div class="form-group"><label>Upload Featured Image</label><input type="file" name="featured_image" class="form-control" accept="image/*"></div>
      <div class="form-group"><label>Excerpt</label><textarea class="form-control" rows="3" name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea></div>
      <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published', $post->is_published) ? 'checked' : '' }}><label class="form-check-label" for="is_published">Published</label></div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.blog.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Save Changes</button></div>
  </div>
</form>
@endsection


