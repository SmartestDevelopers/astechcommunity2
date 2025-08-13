@extends('layouts.admin')

@section('title', 'Service Details')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <div>
    <h1 class="admin-page-title">Service Details</h1>
    <div class="text-muted">View complete service information</div>
  </div>
  <div>
    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-success mr-2"><i class="fas fa-edit mr-1"></i> Edit</a>
    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="d-inline" onsubmit="return confirmDelete()">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i> Delete</button>
    </form>
  </div>
  </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon-check-circle mr-10"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Main Service Information -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <div class="d-flex items-start justify-between mb-20">
                    <div>
                        <h3 class="mb-2">{{ $service->title }}</h3>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-info mr-2">{{ $service->category }}</span>
                            <span class="badge {{ $service->is_active ? 'badge-success' : 'badge-secondary' }}">{{ $service->is_active ? 'Active' : 'Inactive' }}</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="h4 text-success mb-0">${{ number_format($service->price, 2) }}</div>
                        <div class="text-muted">{{ $service->duration }}</div>
                    </div>
                </div>

                @if($service->featured_image)
                    <div class="mb-3">
                        <img src="{{ $service->featured_image }}" alt="{{ $service->title }}" 
                             class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-3">
                    <h5 class="card-title">Service Description</h5>
                    <div>
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                @if($service->tags)
                    <div class="mb-2">
                        <h6 class="mb-2">Tags</h6>
                        <div class="d-flex flex-wrap">
                            @foreach(explode(',', $service->tags) as $tag)
                                <span class="badge badge-light mr-1">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>

        <!-- Service Metadata -->
        <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Service Information</h5>
                <div>
                  <div class="d-flex justify-content-between py-1"><span>Service ID</span><span>#{{ $service->id }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Category</span><span>{{ $service->category }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Price</span><span class="text-success">${{ number_format($service->price, 2) }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Duration</span><span>{{ $service->duration }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Status</span><span class="badge {{ $service->is_active ? 'badge-success' : 'badge-secondary' }}">{{ $service->is_active ? 'Active' : 'Inactive' }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Created</span><span>{{ $service->created_at->format('M d, Y') }}</span></div>
                  <div class="d-flex justify-content-between py-1"><span>Last Updated</span><span>{{ $service->updated_at->format('M d, Y') }}</span></div>
                  @if($service->featured_image)
                    <div class="d-flex justify-content-between py-1 align-items-center"><span>Featured Image</span><a href="{{ $service->featured_image }}" target="_blank">View</a></div>
                  @endif
                </div>
              </div>
            </div>

            <!-- Quick Actions -->
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Quick Actions</h5>
                <div>
                  <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-success mr-2"><i class="fas fa-edit mr-1"></i> Edit</a>
                  <button onclick="duplicateService()" class="btn btn-sm btn-outline-info mr-2"><i class="fas fa-copy mr-1"></i> Duplicate</button>
                  <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="d-inline" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i> Delete</button>
                  </form>
                  <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary ml-2"><i class="fas fa-list mr-1"></i> All Services</a>
                </div>
              </div>
            </div>

            <!-- Service Stats (if needed) -->
            <div class="card mt-3">
              <div class="card-body">
                <h5 class="card-title">Service Stats</h5>
                <div>
                  <div class="d-flex justify-content-between"><span>Views</span><span>-</span></div>
                  <div class="d-flex justify-content-between"><span>Inquiries</span><span>-</span></div>
                  <div class="d-flex justify-content-between"><span>Bookings</span><span>-</span></div>
                </div>
                <small class="text-muted d-block mt-2">Stats tracking will be available in future updates</small>
              </div>
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
