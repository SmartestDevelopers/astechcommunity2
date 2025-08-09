@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="page-header">
    <h1>Dashboard Overview</h1>
    <nav class="breadcrumb">
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-primary-custom text-white">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3>{{ $stats['services'] ?? 0 }}</h3>
            <p>Services</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-success-custom text-white">
                <i class="fas fa-blog"></i>
            </div>
            <h3>{{ $stats['blog_posts'] ?? 0 }}</h3>
            <p>Blog Posts</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-info-custom text-white">
                <i class="fas fa-crown"></i>
            </div>
            <h3>{{ $stats['membership_plans'] ?? 0 }}</h3>
            <p>Membership Plans</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-warning-custom text-white">
                <i class="fas fa-question-circle"></i>
            </div>
            <h3>{{ $stats['faqs'] ?? 0 }}</h3>
            <p>FAQs</p>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-secondary text-white">
                <i class="fas fa-users"></i>
            </div>
            <h3>{{ $stats['freelancers'] ?? 0 }}</h3>
            <p>Freelancers</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-dark text-white">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h3>{{ $stats['mentors'] ?? 0 }}</h3>
            <p>Mentors</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-danger-custom text-white">
                <i class="fas fa-handshake"></i>
            </div>
            <h3>{{ $stats['clients'] ?? 0 }}</h3>
            <p>Clients</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="admin-card stats-card">
            <div class="icon bg-danger text-white">
                <i class="fas fa-heart"></i>
            </div>
            <h3>{{ $stats['charity_programs'] ?? 0 }}</h3>
            <p>Charity Programs</p>
        </div>
    </div>
</div>

<!-- Management Sections -->
<div class="row g-4">
    <!-- Services Management -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-primary-custom text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <h5 class="mb-1">Services Management</h5>
                    <p class="text-muted small mb-0">Manage your business services and offerings</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Blog Management -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-success-custom text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-blog"></i>
                </div>
                <div>
                    <h5 class="mb-1">Blog Management</h5>
                    <p class="text-muted small mb-0">Create and manage blog posts and articles</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-success btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-success btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ Management -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-warning-custom text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div>
                    <h5 class="mb-1">FAQ Management</h5>
                    <p class="text-muted small mb-0">Manage frequently asked questions</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-warning btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-warning btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Membership Plans -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-info-custom text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <h5 class="mb-1">Membership Plans</h5>
                    <p class="text-muted small mb-0">Manage subscription plans and pricing</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.membership.index') }}" class="btn btn-outline-info btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.membership.create') }}" class="btn btn-info btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Freelancers Network -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-secondary text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h5 class="mb-1">Freelancers Network</h5>
                    <p class="text-muted small mb-0">Manage freelancer profiles and listings</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.freelancers.index') }}" class="btn btn-outline-secondary btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.freelancers.create') }}" class="btn btn-secondary btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Mentors Network -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-dark text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h5 class="mb-1">Mentors Network</h5>
                    <p class="text-muted small mb-0">Manage mentor profiles and sessions</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.mentors.index') }}" class="btn btn-outline-dark btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.mentors.create') }}" class="btn btn-dark btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Clients Management -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-primary text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-handshake"></i>
                </div>
                <div>
                    <h5 class="mb-1">Clients Management</h5>
                    <p class="text-muted small mb-0">Manage client profiles and partnerships</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-primary btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.clients.create') }}" class="btn btn-primary btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- Charity Programs -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-danger text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-heart"></i>
                </div>
                <div>
                    <h5 class="mb-1">Charity Programs</h5>
                    <p class="text-muted small mb-0">Manage charity initiatives and programs</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.charity.index') }}" class="btn btn-outline-danger btn-sm flex-fill">
                    <i class="fas fa-list me-1"></i> View All
                </a>
                <a href="{{ route('admin.charity.create') }}" class="btn btn-danger btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>

    <!-- SEO Management -->
    <div class="col-lg-6 col-xl-4">
        <div class="admin-card p-4 h-100">
            <div class="d-flex align-items-center mb-3">
                <div class="icon bg-success text-white me-3" style="width: 50px; height: 50px; font-size: 20px;">
                    <i class="fas fa-search"></i>
                </div>
                <div>
                    <h5 class="mb-1">SEO Management</h5>
                    <p class="text-muted small mb-0">Manage meta titles, descriptions, and SEO settings for all pages</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-success btn-sm flex-fill">
                    <i class="fas fa-cog me-1"></i> Manage SEO
                </a>
                <a href="{{ route('admin.seo.create') }}" class="btn btn-success btn-sm flex-fill">
                    <i class="fas fa-plus me-1"></i> Add New
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
