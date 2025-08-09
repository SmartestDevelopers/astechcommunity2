@extends('layouts.front')

@section('title', 'Manage Services - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-between items-center mb-30">
                <div>
                    <h1 class="text-30 lh-15 fw-700">Manage Services</h1>
                    <p class="text-15 text-dark-1">View and manage all business services and offerings</p>
                </div>
                <a href="{{ route('admin.services.create') }}" class="button -md -purple-1 text-white">
                    <i class="icon-plus mr-10"></i>Add New Service
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
                    <h4 class="text-18 fw-500">All Services ({{ $services->total() }})</h4>
                    <div class="d-flex items-center x-gap-15">
                        <div class="form-group">
                            <select class="form-control -sm" onchange="filterServices(this.value)">
                                <option value="">Filter by Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
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
                                        <span class="badge -purple-1 text-purple-1 text-11">{{ $service->category }}</span>
                                    </td>
                                    <td class="text-14 fw-500 text-green-1">${{ number_format($service->price, 2) }}</td>
                                    <td class="text-14">{{ $service->duration }}</td>
                                    <td class="text-14">
                                        <span class="badge {{ $service->is_active ? '-green-1 text-green-1' : '-red-1 text-red-1' }} text-11">
                                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-14">{{ $service->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex items-center justify-center x-gap-10">
                                            <a href="{{ route('admin.services.show', $service) }}" 
                                               class="button -sm -blue-1 text-white" title="View Details">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.services.edit', $service) }}" 
                                               class="button -sm -green-1 text-white" title="Edit">
                                                <i class="icon-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" 
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

                @if($services->hasPages())
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="d-flex justify-between items-center">
                                <div class="text-14 text-dark-1">
                                    Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} 
                                    of {{ $services->total() }} results
                                </div>
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

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
