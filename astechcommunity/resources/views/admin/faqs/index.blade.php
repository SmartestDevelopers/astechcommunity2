@extends('layouts.admin')

@section('title', 'Manage FAQs')

@section('content')
<div class="admin-page-header d-flex justify-content-between align-items-center">
  <h1 class="admin-page-title">FAQs</h1>
  <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Add New FAQ</a>
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
          <h4 class="mb-0">All FAQs ({{ $faqs->total() }})</h4>
          <div class="d-flex align-items-center">
            <select class="form-control form-control-sm mr-2" onchange="filterFaqs(this.value)">
              <option value="">All Categories</option>
              <option value="General">General</option>
              <option value="Services">Services</option>
              <option value="Pricing">Pricing</option>
              <option value="Technical">Technical</option>
              <option value="Account">Account</option>
              <option value="Support">Support</option>
              <option value="Billing">Billing</option>
              <option value="Other">Other</option>
            </select>
            <select class="form-control form-control-sm" onchange="filterByStatus(this.value)">
              <option value="">All Status</option>
              <option value="featured">Featured</option>
              <option value="regular">Regular</option>
            </select>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-13 fw-500">ID</th>
                                <th class="text-13 fw-500">Question</th>
                                <th class="text-13 fw-500">Category</th>
                                <th class="text-13 fw-500">Status</th>
                                <th class="text-13 fw-500">Sort Order</th>
                                <th class="text-13 fw-500">Created</th>
                                <th class="text-13 fw-500 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                                <tr>
                                    <td class="text-14">#{{ $faq->id }}</td>
                                    <td class="text-14 fw-500">
                                        <div class="d-flex flex-column">
                                            <span>{{ Str::limit($faq->question, 60) }}</span>
                                            <small class="text-12 text-dark-1">{{ Str::limit($faq->answer, 80) }}</small>
                                        </div>
                                    </td>
                                    <td class="text-14">
                                        <span class="badge badge-warning">{{ $faq->category }}</span>
                                    </td>
                                    <td class="text-14">
                                        <span class="badge {{ $faq->is_featured ? 'badge-info' : 'badge-secondary' }}">{{ $faq->is_featured ? 'Featured' : 'Regular' }}</span>
                                    </td>
                                    <td class="text-14 text-center">
                                        <span class="badge badge-light">{{ $faq->sort_order ?? '-' }}</span>
                                    </td>
                                    <td class="text-14">{{ $faq->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                          <a href="{{ route('admin.faqs.show', $faq) }}" class="btn btn-sm btn-info" title="View"><i class="fas fa-eye"></i></a>
                                          <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                          <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="d-inline" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                          </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <h5 class="mb-2">No FAQs Found</h5>
                                        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Add New FAQ</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
          </table>
        </div>
      </div>
      @if($faqs->hasPages())
        <div class="card-footer">
          <div class="d-flex justify-content-between align-items-center">
            <div>Showing {{ $faqs->firstItem() }} to {{ $faqs->lastItem() }} of {{ $faqs->total() }} results</div>
            {{ $faqs->links() }}
          </div>
        </div>
      @endif
    </div>

    <div class="row mt-3">
      <div class="col-md-3 col-6"><div class="card"><div class="card-body d-flex justify-content-between align-items-center"><span>General</span><span class="badge badge-warning">{{ $faqs->where('category', 'General')->count() }}</span></div></div></div>
      <div class="col-md-3 col-6"><div class="card"><div class="card-body d-flex justify-content-between align-items-center"><span>Services</span><span class="badge badge-warning">{{ $faqs->where('category', 'Services')->count() }}</span></div></div></div>
      <div class="col-md-3 col-6"><div class="card"><div class="card-body d-flex justify-content-between align-items-center"><span>Technical</span><span class="badge badge-warning">{{ $faqs->where('category', 'Technical')->count() }}</span></div></div></div>
      <div class="col-md-3 col-6"><div class="card"><div class="card-body d-flex justify-content-between align-items-center"><span>Featured</span><span class="badge badge-info">{{ $faqs->where('is_featured', true)->count() }}</span></div></div></div>
    </div>

    <div class="card mt-3">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="text-muted">Tips: Use the sort order field to control the display order of FAQs</div>
        <div>
          <button class="btn btn-sm btn-outline-info" onclick="reorderFaqs()"><i class="fas fa-sort mr-1"></i> Auto Sort</button>
          <button class="btn btn-sm btn-outline-success" onclick="exportFaqs()"><i class="fas fa-download mr-1"></i> Export</button>
        </div>
      </div>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.');
}

function filterFaqs(category) {
    const url = new URL(window.location.href);
    if (category) {
        url.searchParams.set('category', category);
    } else {
        url.searchParams.delete('category');
    }
    window.location.href = url.toString();
}

function filterByStatus(status) {
    const url = new URL(window.location.href);
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    window.location.href = url.toString();
}

function reorderFaqs() {
    if (confirm('This will automatically assign sort orders based on creation date. Continue?')) {
        // You can implement auto-sorting functionality here
        alert('Auto-sorting feature will be implemented in the next update.');
    }
}

function exportFaqs() {
    // You can implement export functionality here
    alert('Export feature will be implemented in the next update.');
}
</script>
@endsection
