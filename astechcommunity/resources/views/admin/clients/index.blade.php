@extends('layouts.admin')

@section('title', 'Clients')
@section('page-title', 'Clients')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="admin-page-title">Clients</h1>
  <a href="{{ route('admin.clients.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> New</a>
  </div>
<div class="card">
  <div class="table-responsive">
    <table class="table mb-0">
      <thead><tr><th>#</th><th>Company</th><th>Contact</th><th>Email</th><th>Industry</th><th>Status</th><th class="text-right">Actions</th></tr></thead>
      <tbody>
        @forelse($clients as $client)
          <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->company_name }}</td>
            <td>{{ $client->contact_person }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->industry }}</td>
            <td>{{ $client->is_active_client ? 'Active' : 'Inactive' }}</td>
            <td class="text-right">
              <a href="{{ route('admin.clients.show', $client) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center py-4">No clients found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($clients->hasPages())
    <div class="card-footer">{{ $clients->links() }}</div>
  @endif
</div>
@endsection


