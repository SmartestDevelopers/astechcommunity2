@extends('layouts.admin')

@section('title', 'Edit FAQ')
@section('page-title', 'Edit FAQ')

@section('content')
<form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <div class="form-group"><label>Question</label><input class="form-control" name="question" value="{{ old('question', $faq->question) }}" required></div>
      <div class="form-group"><label>Answer</label><textarea class="form-control" rows="6" name="answer" required>{{ old('answer', $faq->answer) }}</textarea></div>
      <div class="form-row">
        <div class="form-group col-md-6"><label>Category</label><input class="form-control" name="category" value="{{ old('category', $faq->category) }}" required></div>
        <div class="form-group col-md-6"><label>Sort Order</label><input type="number" min="0" class="form-control" name="sort_order" value="{{ old('sort_order', $faq->sort_order) }}"></div>
      </div>
      <div class="form-check"><input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $faq->is_featured) ? 'checked' : '' }}><label class="form-check-label" for="is_featured">Featured</label></div>
    </div>
    <div class="card-footer d-flex justify-content-end"><a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary mr-2">Cancel</a><button type="submit" class="btn btn-primary">Save Changes</button></div>
  </div>
</form>
@endsection


