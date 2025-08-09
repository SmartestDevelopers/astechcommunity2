<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom Admin CSS -->
    <style>
        /* Reset and Override Conflicts */
        * {
            box-sizing: border-box;
        }

        .admin-body {
            font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        /* Custom Admin Wrapper */
        .admin-wrapper {
            min-height: 100vh;
        }

        /* Sidebar customization */
        .main-sidebar {
            background: linear-gradient(135deg, #6f42c1 0%, #8e44ad 100%) !important;
        }

        .nav-sidebar .nav-link {
            color: rgba(255,255,255,0.9) !important;
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1) !important;
            color: white !important;
        }

        .nav-sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2) !important;
            color: white !important;
        }

        .nav-header {
            color: rgba(255,255,255,0.6) !important;
            background: transparent !important;
        }

        /* Stats Cards */
        .stats-card {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .stats-card:hover {
            transform: translateY(-2px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 10px 0 5px 0;
            color: #333;
        }

        .stats-label {
            margin: 0;
            color: #666;
            font-weight: 500;
        }

        /* Management Cards */
        .management-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: 100%;
            transition: transform 0.2s ease;
        }

        .management-card:hover {
            transform: translateY(-2px);
        }

        .management-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .management-icon {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-right: 15px;
        }

        .management-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .management-desc {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }

        .management-actions {
            display: flex;
            gap: 8px;
        }

        /* Button Styles */
        .admin-btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid;
            transition: all 0.2s ease;
            flex: 1;
        }

        .admin-btn i {
            margin-right: 4px;
        }

        .admin-btn-outline {
            background: transparent;
            color: #6f42c1;
            border-color: #6f42c1;
        }

        .admin-btn-outline:hover {
            background: #6f42c1;
            color: white;
        }

        .admin-btn-solid {
            background: #6f42c1;
            color: white;
            border-color: #6f42c1;
        }

        .admin-btn-solid:hover {
            background: #5a2d91;
            border-color: #5a2d91;
            color: white;
        }

        /* Color variants */
        .bg-primary-admin { background-color: #6f42c1 !important; }
        .bg-success-admin { background-color: #28a745 !important; }
        .bg-info-admin { background-color: #17a2b8 !important; }
        .bg-warning-admin { background-color: #ffc107 !important; }
        .bg-danger-admin { background-color: #dc3545 !important; }
        .bg-secondary-admin { background-color: #6c757d !important; }
        .bg-dark-admin { background-color: #343a40 !important; }

        /* Responsive */
        @media (max-width: 768px) {
            .management-header {
                flex-direction: column;
                text-align: center;
            }
            
            .management-icon {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        /* Page header */
        .admin-page-header {
            margin-bottom: 30px;
        }

        .admin-page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        /* Content wrapper customization */
        .content-wrapper {
            background-color: #f4f6f9 !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed admin-body">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link">@yield('page-title', 'Dashboard')</span>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('/') }}" class="dropdown-item" target="_blank">
            <i class="fas fa-globe mr-2"></i> View Website
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item" 
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name') }} Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Dashboard -->
          <li class="nav-header">DASHBOARD</li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard Overview</p>
            </a>
          </li>

          <!-- Content Management -->
          <li class="nav-header">CONTENT MANAGEMENT</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Services Management</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.blog.index') }}" class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-blog"></i>
              <p>Blog Management</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>FAQ Management</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.membership.index') }}" class="nav-link {{ request()->routeIs('admin.membership.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-crown"></i>
              <p>Membership Plans</p>
            </a>
          </li>

          <!-- Community -->
          <li class="nav-header">COMMUNITY</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.freelancers.index') }}" class="nav-link {{ request()->routeIs('admin.freelancers.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Freelancers Network</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.mentors.index') }}" class="nav-link {{ request()->routeIs('admin.mentors.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>Mentors Network</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-handshake"></i>
              <p>Clients Management</p>
            </a>
          </li>

          <!-- Initiatives -->
          <li class="nav-header">INITIATIVES</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.charity.index') }}" class="nav-link {{ request()->routeIs('admin.charity.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-heart"></i>
              <p>Charity Programs</p>
            </a>
          </li>

          <!-- Settings -->
          <li class="nav-header">SETTINGS</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.seo.index') }}" class="nav-link {{ request()->routeIs('admin.seo.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-search"></i>
              <p>SEO Management</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        @if (session('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i> {{ session('success') }}
          </div>
        @endif

        @if (session('error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i> {{ session('error') }}
          </div>
        @endif
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

</div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 JS (AdminLTE uses Bootstrap 4) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    
    <!-- Custom Admin JS -->
    <script>
        $(document).ready(function() {
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>
