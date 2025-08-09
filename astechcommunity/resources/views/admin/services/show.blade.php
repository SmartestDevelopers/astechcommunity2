@extends('layouts.front')

@section('title', 'Service Details - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex items-center justify-between mb-30">
                <div class="d-flex items-center">
                    <a href="{{ route('admin.services.index') }}" class="button -sm -outline-purple-1 text-purple-1 mr-20">
                        <i class="icon-arrow-left mr-10"></i>Back to Services
                    </a>
                    <div>
                        <h1 class="text-30 lh-15 fw-700">Service Details</h1>
                        <p class="text-15 text-dark-1">View complete service information</p>
                    </div>
                </div>
                <div class="d-flex x-gap-15">
                    <a href="{{ route('admin.services.edit', $service) }}" class="button -md -green-1 text-white">
                        <i class="icon-edit mr-10"></i>Edit Service
                    </a>
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" 
                          style="display: inline-block;" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button -md -red-1 text-white">
                            <i class="icon-trash mr-10"></i>Delete Service
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon-check-circle mr-10"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row y-gap-30">
        <!-- Main Service Information -->
        <div class="col-lg-8">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <div class="d-flex items-start justify-between mb-20">
                    <div>
                        <h3 class="text-24 lh-15 fw-700 mb-10">{{ $service->title }}</h3>
                        <div class="d-flex items-center x-gap-20">
                            <span class="badge -purple-1 text-purple-1 text-13 fw-500">{{ $service->category }}</span>
                            <span class="badge {{ $service->is_active ? '-green-1 text-green-1' : '-red-1 text-red-1' }} text-13 fw-500">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-24 fw-700 text-green-1">${{ number_format($service->price, 2) }}</div>
                        <div class="text-14 text-dark-1">{{ $service->duration }}</div>
                    </div>
                </div>

                @if($service->featured_image)
                    <div class="mb-30">
                        <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" 
                             class="w-100 rounded-8" style="max-height: 300px; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-30">
                    <h5 class="text-18 fw-500 mb-15">Service Description</h5>
                    <div class="text-15 lh-1-6 text-dark-1">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                @if($service->tags)
                    <div class="mb-20">
                        <h6 class="text-16 fw-500 mb-15">Tags</h6>
                        <div class="d-flex flex-wrap x-gap-10 y-gap-10">
                            @foreach(explode(',', $service->tags) as $tag)
                                <span class="badge -outline-purple-1 text-purple-1 text-13">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Service Metadata -->
        <div class="col-lg-4">
            <div class="bg-white rounded-8 shadow-2 px-25 py-30">
                <h5 class="text-18 fw-500 mb-20">Service Information</h5>
                
                <div class="y-gap-20">
                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Service ID</span>
                        <span class="text-14 fw-500">#{{ $service->id }}</span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Category</span>
                        <span class="text-14 fw-500">{{ $service->category }}</span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Price</span>
                        <span class="text-14 fw-500 text-green-1">${{ number_format($service->price, 2) }}</span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Duration</span>
                        <span class="text-14 fw-500">{{ $service->duration }}</span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Status</span>
                        <span class="badge {{ $service->is_active ? '-green-1 text-green-1' : '-red-1 text-red-1' }} text-11">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Created</span>
                        <span class="text-14 fw-500">{{ $service->created_at->format('M d, Y') }}</span>
                    </div>

                    <div class="d-flex justify-between items-center py-10 border-bottom-light">
                        <span class="text-14 text-dark-1">Last Updated</span>
                        <span class="text-14 fw-500">{{ $service->updated_at->format('M d, Y') }}</span>
                    </div>

                    @if($service->featured_image)
                        <div class="d-flex justify-between items-center py-10">
                            <span class="text-14 text-dark-1">Featured Image</span>
                            <a href="{{ $service->featured_image }}" target="_blank" class="text-14 fw-500 text-purple-1">
                                <i class="icon-external-link"></i> View
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30 mt-30">
                <h5 class="text-18 fw-500 mb-20">Quick Actions</h5>
                
                <div class="d-flex flex-column y-gap-15">
                    <a href="{{ route('admin.services.edit', $service) }}" class="button -sm -outline-green-1 text-green-1">
                        <i class="icon-edit mr-10"></i>Edit Service
                    </a>
                    
                    <button onclick="duplicateService()" class="button -sm -outline-blue-1 text-blue-1">
                        <i class="icon-copy mr-10"></i>Duplicate Service
                    </button>

                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button -sm -outline-red-1 text-red-1 w-100">
                            <i class="icon-trash mr-10"></i>Delete Service
                        </button>
                    </form>

                    <a href="{{ route('admin.services.index') }}" class="button -sm -outline-dark-1 text-dark-1">
                        <i class="icon-list mr-10"></i>All Services
                    </a>
                </div>
            </div>

            <!-- Service Stats (if needed) -->
            <div class="bg-white rounded-8 shadow-2 px-25 py-30 mt-30">
                <h5 class="text-18 fw-500 mb-20">Service Stats</h5>
                
                <div class="y-gap-15">
                    <div class="d-flex justify-between items-center">
                        <span class="text-14 text-dark-1">Views</span>
                        <span class="text-14 fw-500">-</span>
                    </div>
                    
                    <div class="d-flex justify-between items-center">
                        <span class="text-14 text-dark-1">Inquiries</span>
                        <span class="text-14 fw-500">-</span>
                    </div>
                    
                    <div class="d-flex justify-between items-center">
                        <span class="text-14 text-dark-1">Bookings</span>
                        <span class="text-14 fw-500">-</span>
                    </div>
                </div>
                
                <small class="text-12 text-dark-1 mt-10">
                    Stats tracking will be available in future updates
                </small>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this service?\n\nThis action cannot be undone and will permanently remove:\n- Service details\n- All associated data\n\nClick OK to confirm deletion.');
}

function duplicateService() {
    const url = "{{ route('admin.services.create') }}";
    const params = new URLSearchParams({
        duplicate: {{ $service->id }},
        title: "{{ $service->title }} (Copy)",
        category: "{{ $service->category }}",
        price: "{{ $service->price }}",
        duration: "{{ $service->duration }}",
        description: "{{ addslashes($service->description) }}",
        tags: "{{ $service->tags }}",
        featured_image: "{{ $service->featured_image }}"
    });
    
    window.location.href = `${url}?${params.toString()}`;
}

// Copy service URL to clipboard
function copyServiceUrl() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        alert('Service URL copied to clipboard!');
    });
}
</script>
@endsection
