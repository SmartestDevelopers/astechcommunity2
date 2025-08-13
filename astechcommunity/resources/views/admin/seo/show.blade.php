@extends('layouts.admin')

@section('title', 'SEO Page Details')
@section('page-title', 'SEO Page Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h3 class="mb-1">{{ $seoPage->page_name }}</h3>
    <div class="text-muted mb-3">URL: {{ $seoPage->page_url }}</div>
    <dl class="row mb-0">
      <dt class="col-4">Meta Title</dt><dd class="col-8">{{ $seoPage->meta_title }}</dd>
      <dt class="col-4">Meta Description</dt><dd class="col-8">{{ $seoPage->meta_description }}</dd>
      <dt class="col-4">Meta Keywords</dt><dd class="col-8">{{ $seoPage->meta_keywords }}</dd>
      <dt class="col-4">OG Title</dt><dd class="col-8">{{ $seoPage->og_title }}</dd>
      <dt class="col-4">OG Description</dt><dd class="col-8">{{ $seoPage->og_description }}</dd>
      <dt class="col-4">OG Image</dt><dd class="col-8">{{ $seoPage->og_image }}</dd>
      <dt class="col-4">Canonical URL</dt><dd class="col-8">{{ $seoPage->canonical_url }}</dd>
      <dt class="col-4">Robots</dt><dd class="col-8">{{ $seoPage->robots }}</dd>
    </dl>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.seo.edit', $seoPage) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


