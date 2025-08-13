@extends('layouts.front')

@section('title', 'Manage Blog Posts - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-between items-center mb-30">
                <div>
                    <h1 class="text-30 lh-15 fw-700">Manage Blog Posts</h1>
                    <p class="text-15 text-dark-1">Create, edit and manage all blog articles</p>
                </div>
                <a href="{{ route('admin.blog.create') }}" class="button -md -green-1 text-white">
                    <i class="icon-plus mr-10"></i>Add New Post
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon-check-circle mr-10"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <div class="d-flex justify-between items-center mb-20">
                    <h4 class="text-18 fw-500">All Blog Posts ({{ $posts->total() }})</h4>
                    <div class="d-flex items-center x-gap-15">
                        <div class="form-group">
                            <select class="form-control -sm" onchange="filterPosts(this.value)">
                                <option value="">Filter by Status</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control -sm" onchange="filterByCategory(this.value)">
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
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
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
                                            @if($post->featured_image)
                                                <small class="text-purple-1">
                                                    <i class="icon-image mr-5"></i>Has featured image
                                                </small>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-14">{{ $post->author }}</td>
                                    <td class="text-14">
                                        <span class="badge -blue-1 text-blue-1 text-11">{{ $post->category }}</span>
                                    </td>
                                    <td class="text-14">
                                        <span class="badge {{ $post->is_published ? '-green-1 text-green-1' : '-orange-1 text-orange-1' }} text-11">
                                            {{ $post->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td class="text-14">
                                        {{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}
                                    </td>
                                    <td class="text-14">{{ $post->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex items-center justify-center x-gap-10">
                                            <a href="{{ route('admin.blog.show', $post) }}" 
                                               class="button -sm -blue-1 text-white" title="View Details">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.blog.edit', $post) }}" 
                                               class="button -sm -green-1 text-white" title="Edit">
                                                <i class="icon-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" 
                                                  style="display: inline-block;" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button -sm -red-1 text-white" title="Delete">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-40">
                                        <div class="d-flex flex-column items-center">
                                            <i class="icon-file-text text-60 text-light-1 mb-20"></i>
                                            <h5 class="text-18 fw-500 mb-10">No Blog Posts Found</h5>
                                            <p class="text-15 text-dark-1 mb-20">Start by creating your first blog post</p>
                                            <a href="{{ route('admin.blog.create') }}" class="button -md -green-1 text-white">
                                                Add New Post
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($posts->hasPages())
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="d-flex justify-between items-center">
                                <div class="text-14 text-dark-1">
                                    Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} 
                                    of {{ $posts->total() }} results
                                </div>
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mt-30">
        <div class="col-md-3 col-6">
            <div class="bg-white rounded-8 shadow-2 px-20 py-20">
                         <div class="d-flex items-center">
                            <div class="icon-file-text text-24 text-green-1 mr-15"></div>
                            <div>
                                <div class="text-18 fw-700">{{ $totalPosts ?? $posts->total() }}</div>
                        <div class="text-13 text-dark-1">Total Posts</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="bg-white rounded-8 shadow-2 px-20 py-20">
                         <div class="d-flex items-center">
                    <div class="icon-check text-24 text-purple-1 mr-15"></div>
                    <div>
                                <div class="text-18 fw-700">{{ $publishedPostsCount ?? 0 }}</div>
                        <div class="text-13 text-dark-1">Published</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="bg-white rounded-8 shadow-2 px-20 py-20">
                         <div class="d-flex items-center">
                    <div class="icon-edit text-24 text-orange-1 mr-15"></div>
                    <div>
                                <div class="text-18 fw-700">{{ $draftPostsCount ?? 0 }}</div>
                        <div class="text-13 text-dark-1">Drafts</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="bg-white rounded-8 shadow-2 px-20 py-20">
                         <div class="d-flex items-center">
                    <div class="icon-calendar text-24 text-red-1 mr-15"></div>
                    <div>
                                <div class="text-18 fw-700">{{ $todayPostsCount ?? 0 }}</div>
                        <div class="text-13 text-dark-1">Today</div>
                    </div>
                </div>
            </div>
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
