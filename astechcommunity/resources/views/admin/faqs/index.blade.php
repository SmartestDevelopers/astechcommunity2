@extends('layouts.front')

@section('title', 'Manage FAQs - Admin')

@section('content')
<div class="container py-60">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-between items-center mb-30">
                <div>
                    <h1 class="text-30 lh-15 fw-700">Manage FAQs</h1>
                    <p class="text-15 text-dark-1">Create and manage frequently asked questions</p>
                </div>
                <a href="{{ route('admin.faqs.create') }}" class="button -md -orange-1 text-white">
                    <i class="icon-plus mr-10"></i>Add New FAQ
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
                    <h4 class="text-18 fw-500">All FAQs ({{ $faqs->total() }})</h4>
                    <div class="d-flex items-center x-gap-15">
                        <div class="form-group">
                            <select class="form-control -sm" onchange="filterFaqs(this.value)">
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
                        </div>
                        <div class="form-group">
                            <select class="form-control -sm" onchange="filterByStatus(this.value)">
                                <option value="">All Status</option>
                                <option value="featured">Featured</option>
                                <option value="regular">Regular</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
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
                                        <span class="badge -orange-1 text-orange-1 text-11">{{ $faq->category }}</span>
                                    </td>
                                    <td class="text-14">
                                        <span class="badge {{ $faq->is_featured ? '-purple-1 text-purple-1' : '-light-1 text-dark-1' }} text-11">
                                            {{ $faq->is_featured ? 'Featured' : 'Regular' }}
                                        </span>
                                    </td>
                                    <td class="text-14 text-center">
                                        <span class="badge -outline-blue-1 text-blue-1 text-11">{{ $faq->sort_order ?? '-' }}</span>
                                    </td>
                                    <td class="text-14">{{ $faq->created_at->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex items-center justify-center x-gap-10">
                                            <a href="{{ route('admin.faqs.show', $faq) }}" 
                                               class="button -sm -blue-1 text-white" title="View Details">
                                                <i class="icon-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" 
                                               class="button -sm -green-1 text-white" title="Edit">
                                                <i class="icon-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" 
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
                                    <td colspan="7" class="text-center py-40">
                                        <div class="d-flex flex-column items-center">
                                            <i class="icon-help-circle text-60 text-light-1 mb-20"></i>
                                            <h5 class="text-18 fw-500 mb-10">No FAQs Found</h5>
                                            <p class="text-15 text-dark-1 mb-20">Start by adding your first FAQ</p>
                                            <a href="{{ route('admin.faqs.create') }}" class="button -md -orange-1 text-white">
                                                Add New FAQ
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($faqs->hasPages())
                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="d-flex justify-between items-center">
                                <div class="text-14 text-dark-1">
                                    Showing {{ $faqs->firstItem() }} to {{ $faqs->lastItem() }} 
                                    of {{ $faqs->total() }} results
                                </div>
                                {{ $faqs->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- FAQ Categories Overview -->
    <div class="row mt-30">
        <div class="col-12">
            <div class="bg-white rounded-8 shadow-2 px-30 py-30">
                <h5 class="text-18 fw-500 mb-20">FAQ Categories</h5>
                <div class="row y-gap-15">
                    <div class="col-md-3 col-6">
                        <div class="d-flex items-center justify-between p-15 bg-light rounded-8">
                            <span class="text-14 fw-500">General</span>
                            <span class="badge -outline-orange-1 text-orange-1 text-11">
                                {{ $faqs->where('category', 'General')->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex items-center justify-between p-15 bg-light rounded-8">
                            <span class="text-14 fw-500">Services</span>
                            <span class="badge -outline-orange-1 text-orange-1 text-11">
                                {{ $faqs->where('category', 'Services')->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex items-center justify-between p-15 bg-light rounded-8">
                            <span class="text-14 fw-500">Technical</span>
                            <span class="badge -outline-orange-1 text-orange-1 text-11">
                                {{ $faqs->where('category', 'Technical')->count() }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="d-flex items-center justify-between p-15 bg-light rounded-8">
                            <span class="text-14 fw-500">Featured</span>
                            <span class="badge -outline-purple-1 text-purple-1 text-11">
                                {{ $faqs->where('is_featured', true)->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions (Optional) -->
    <div class="row mt-20">
        <div class="col-12">
            <div class="bg-white rounded-8 shadow-2 px-30 py-20">
                <div class="d-flex justify-between items-center">
                    <div class="text-14 text-dark-1">
                        <i class="icon-info-circle mr-5"></i>
                        Tips: Use the sort order field to control the display order of FAQs
                    </div>
                    <div class="d-flex x-gap-15">
                        <button class="button -sm -outline-purple-1 text-purple-1" onclick="reorderFaqs()">
                            <i class="icon-sort mr-5"></i>Auto Sort
                        </button>
                        <button class="button -sm -outline-green-1 text-green-1" onclick="exportFaqs()">
                            <i class="icon-download mr-5"></i>Export
                        </button>
                    </div>
                </div>
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
