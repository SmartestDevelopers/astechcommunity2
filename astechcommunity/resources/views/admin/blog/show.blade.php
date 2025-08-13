@extends('layouts.admin')

@section('title', 'Blog Post')
@section('page-title', 'Blog Post Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $post->title }}</h3>
    <div class="text-muted mb-3">By {{ $post->author }} • {{ $post->category }}</div>
    <div class="mb-3">{!! nl2br(e($post->excerpt)) !!}</div>
    <div>{!! nl2br(e($post->content)) !!}</div>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


