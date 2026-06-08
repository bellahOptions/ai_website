@extends('admin.layout')
@section('title', 'Clients')
@section('page_title', 'Clients')

@section('content')

<div class="page-header">
    <div>
        <h2>Clients</h2>
        <p>{{ $clients->total() }} total clients</p>
    </div>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-primary">+ Add Client</a>
</div>

{{-- Filters --}}
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, company…"
           class="form-input" style="flex:1;min-width:200px;max-width:340px;">
    <select name="status" class="form-input" style="width:160px;">
        <option value="">All Statuses</option>
        <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    <button type="submit" class="btn btn-secondary">Filter</button>
    @if(request('search') || request('status'))
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Clear</a>
    @endif
</form>

<div class="admin-card">
    <div style="overflow-x:auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Contact</th>
                    <th>Location</th>
                    <th>Invoices</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:36px;height:36px;border-radius:50%;background:#61078B;color:#fff;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;flex-shrink:0;">
                                {{ substr($client->name, 0, 1) }}
                            </div>
                            <div>
                                <a href="{{ route('admin.clients.show', $client) }}"
                                   style="color:#61078B;font-weight:600;text-decoration:none;font-size:13.5px;">
                                    {{ $client->name }}
                                </a>
                                @if($client->company)
                                <div style="font-size:12px;color:#9ca3af;">{{ $client->company }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-size:13.5px;color:#374151;">{{ $client->email }}</div>
                        @if($client->phone)<div style="font-size:12px;color:#9ca3af;">{{ $client->phone }}</div>@endif
                    </td>
                    <td style="color:#6b7280;">{{ $client->city ? $client->city . ', ' : '' }}{{ $client->country }}</td>
                    <td style="font-weight:600;color:#111827;">{{ $client->invoices_count }}</td>
                    <td><span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">{{ ucfirst($client->status) }}</span></td>
                    <td class="text-right">
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px;">
                            <a href="{{ route('admin.clients.show', $client) }}" class="btn btn-secondary btn-sm">View</a>
                            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Delete {{ addslashes($client->name) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:48px;">
                        <svg style="width:40px;height:40px;color:#d1d5db;display:block;margin:0 auto 12px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                        <p style="font-size:14px;color:#9ca3af;margin:0 0 8px;">No clients found.</p>
                        <a href="{{ route('admin.clients.create') }}" style="color:#61078B;font-size:13.5px;">Add your first client →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($clients->hasPages())
    <div style="padding:14px 20px;border-top:1px solid #f0f1f3;">{{ $clients->links() }}</div>
    @endif
</div>

@endsection
