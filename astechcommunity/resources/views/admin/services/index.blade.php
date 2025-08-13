@extends('layouts.admin')

@section('title', 'Manage Services')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <h1 class="admin-page-title">Manage Services</h1>
  <a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Add New Service</a>
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
          <h4 class="mb-0">All Services ({{ $services->total() }})</h4>
          <div>
            <select class="form-control form-control-sm" onchange="filterServices(this.value)">
              <option value="">Filter by Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-13 fw-500">ID</th>
                                <th class="text-13 fw-500">Title</th>
                                <th class="text-13 fw-500">Category</th>
                                <th class="text-13 fw-500">Price</th>
                                <th class="text-13 fw-500">Duration</th>
                                <th class="text-13 fw-500">Status</th>
                                <th class="text-13 fw-500">Created</th>
                                <th class="text-13 fw-500 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td class="text-14">#{{ $service->id }}</td>
                                    <td class="text-14 fw-500">
                                        {{ Str::limit($service->title, 30) }}
                                        @if($service->featured_image)
                                            <i class="icon-image text-purple-1 ml-5" title="Has Image"></i>
                                        @endif
                                    </td>
                                    <td class="text-14">
                                        <span class="badge badge-info">{{ $service->category }}</span>
                                    </td>
                                    <td class="text-14 fw-500 text-success">${{ number_format($service->price, 2) }}</td>
                                    <td class="text-14">{{ $service->duration }}</td>
                                    <td class="text-14">
                                        <span class="badge {{ $service->is_active ? 'badge-success' : 'badge-secondary' }}">{{ $service->is_active ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td class="text-14">{{ $service->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                          <a href="{{ route('admin.services.show', $service) }}" class="btn btn-sm btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                          <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="d-inline" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                          </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-40">
                                        <div class="d-flex flex-column items-center">
                                            <i class="icon-service text-60 text-light-1 mb-20"></i>
                                            <h5 class="text-18 fw-500 mb-10">No Services Found</h5>
                                            <p class="text-15 text-dark-1 mb-20">Start by adding your first service</p>
                                            <a href="{{ route('admin.services.create') }}" class="button -md -purple-1 text-white">
                                                Add New Service
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
        </div>
      </div>
      @if($services->hasPages())
        <div class="card-footer">
          <div class="d-flex justify-content-between align-items-center">
            <div>Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} results</div>
            {{ $services->links() }}
          </div>
        </div>
      @endif
    </div>
<script>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this service? This action cannot be undone.');
}

function filterServices(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}
</script>
@endsection
