@extends('layouts.admin')

@section('title', 'Manage Blog Posts')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <h1 class="admin-page-title">Blog Posts</h1>
  <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Add New Post</a>
  </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon-check-circle mr-10"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
      <div class="card-body p-0">
        <div class="p-3 d-flex justify-content-between align-items-center">
          <h4 class="mb-0">All Blog Posts ({{ $posts->total() }})</h4>
          <div class="d-flex align-items-center">
            <select class="form-control form-control-sm mr-2" onchange="filterPosts(this.value)">
              <option value="">Filter by Status</option>
              <option value="published">Published</option>
              <option value="draft">Draft</option>
            </select>
            <select class="form-control form-control-sm" onchange="filterByCategory(this.value)">
              <option value="">All Categories</option>
              <option value="Technology">Technology</option>
              <option value="Web Development">Web Development</option>
              <option value="Mobile Development">Mobile Development</option>
              <option value="AI & Machine Learning">AI & Machine Learning</option>
              <option value="Career">Career</option>
              <option value="Business">Business</option>
              <option value="Tutorials">Tutorials</option>
              <option value="News">News</option>
            </select>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-13 fw-500">ID</th>
                                <th class="text-13 fw-500">Title</th>
                                <th class="text-13 fw-500">Author</th>
                                <th class="text-13 fw-500">Category</th>
                                <th class="text-13 fw-500">Status</th>
                                <th class="text-13 fw-500">Published</th>
                                <th class="text-13 fw-500">Created</th>
                                <th class="text-13 fw-500 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td class="text-14">#{{ $post->id }}</td>
                                    <td class="text-14 fw-500">
                                        <div class="d-flex flex-column">
                                            <span>{{ Str::limit($post->title, 40) }}</span>
                                        </div>
                                    </td>
                                    <td class="text-14">{{ $post->author ?? '—' }}</td>
                                    <td class="text-14">
                                        <span class="badge badge-info">{{ $post->category ?? '—' }}</span>
                                    </td>
                                    <td class="text-14">
                                        <span class="badge {{ $post->status === 'published' ? 'badge-success' : 'badge-warning' }}">
                                            {{ ucfirst($post->status ?? 'draft') }}
                                        </span>
                                    </td>
                                    <td class="text-14">
                                        {{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}
                                    </td>
                                    <td class="text-14">{{ $post->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                          <a href="{{ route('admin.blog.show', $post) }}" class="btn btn-sm btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                          <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" class="d-inline" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                          </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <h5 class="mb-2">No Blog Posts Found</h5>
                                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add New Post</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
          </table>
        </div>
      </div>
      @if($posts->hasPages())
        <div class="card-footer">
          <div class="d-flex justify-content-between align-items-center">
            <div>Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results</div>
            {{ $posts->links() }}
          </div>
        </div>
      @endif
    </div>

    <div class="row mt-3">
      <div class="col-md-3 col-6">
        <div class="card"><div class="card-body"><div class="d-flex align-items-center"><div class="mr-2"><i class="fas fa-file-alt text-success"></i></div><div><div class="h5 mb-0">{{ $totalPosts ?? $posts->total() }}</div><small>Total Posts</small></div></div></div></div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card"><div class="card-body"><div class="d-flex align-items-center"><div class="mr-2"><i class="fas fa-check text-primary"></i></div><div><div class="h5 mb-0">{{ $publishedPostsCount ?? 0 }}</div><small>Published</small></div></div></div></div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card"><div class="card-body"><div class="d-flex align-items-center"><div class="mr-2"><i class="fas fa-edit text-warning"></i></div><div><div class="h5 mb-0">{{ $draftPostsCount ?? 0 }}</div><small>Drafts</small></div></div></div></div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card"><div class="card-body"><div class="d-flex align-items-center"><div class="mr-2"><i class="fas fa-calendar-day text-danger"></i></div><div><div class="h5 mb-0">{{ $todayPostsCount ?? 0 }}</div><small>Today</small></div></div></div></div>
      </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');
}

function filterPosts(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}

function filterByCategory(category) {
    const url = new URL(window.location.href);
    if (category) {
        url.searchParams.set('category', category);
    } else {
        url.searchParams.delete('category');
    }
    window.location.href = url.toString();
}
</script>
@endsection
