@extends('layouts.admin')

@section('title', 'SEO Pages')
@section('page-title', 'SEO Pages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">SEO</h1>
  <a href="{{ route('admin.seo.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Page</th><th>URL</th><th>Meta Title</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($seoPages as $seoPage)
          <tr>
            <td>{{ $seoPage->id }}</td>
            <td>{{ $seoPage->page_name }}</td>
            <td>{{ $seoPage->page_url }}</td>
            <td>{{ $seoPage->meta_title }}</td>
            <td class="text-right">
              <a href="{{ route('admin.seo.show', $seoPage) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.seo.edit', $seoPage) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center py-4">No SEO pages found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($seoPages->hasPages())
    <div class="card-footer">{{ $seoPages->links() }}</div>
  @endif
</div>
@endsection


