@extends('layouts.admin')

@section('title', 'FAQ Details')
@section('page-title', 'FAQ Details')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="mb-2">Q: {{ $faq->question }}</h5>
    <div class="mb-3"><strong>Category:</strong> {{ $faq->category }}</div>
    <p>A: {!! nl2br(e($faq->answer)) !!}</p>
  </div>
  <div class="card-footer d-flex justify-content-between">
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i> Edit</a>
  </div>
</div>
@endsection


