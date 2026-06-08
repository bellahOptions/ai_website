@extends('admin.layout')
@section('title', 'Clients')
@section('page_title', 'Clients')

@section('content')

<div class="flex items-center justify-between mt-2 mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-900">Clients</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ $clients->total() }} total clients</p>
    </div>
    <a href="{{ route('admin.clients.create') }}"
       class="px-4 py-2 rounded-lg text-sm font-semibold text-white shadow-sm transition"
       style="background:#61078B;"
       onmouseover="this.style.background='#7c22a8'"
       onmouseout="this.style.background='#61078B'">
        + Add Client
    </a>
</div>

{{-- Filters --}}
<form method="GET" class="flex flex-col sm:flex-row gap-3 mb-5">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search name, email, company…"
           class="flex-1 px-3.5 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
    <select name="status" class="px-3.5 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
        <option value="">All Statuses</option>
        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    <button type="submit" class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">Filter</button>
    @if(request('search') || request('status'))
    <a href="{{ route('admin.clients.index') }}" class="px-4 py-2 text-sm text-gray-500 hover:text-gray-700 transition flex items-center">Clear</a>
    @endif
</form>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50">
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Client</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Contact</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Location</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Invoices</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($clients as $client)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0 text-sm font-bold text-white" style="background:#61078B;">
                                {{ substr($client->name, 0, 1) }}
                            </div>
                            <div>
                                <a href="{{ route('admin.clients.show', $client) }}"
                                   class="text-sm font-semibold hover:underline" style="color:#61078B;">
                                    {{ $client->name }}
                                </a>
                                @if($client->company)
                                <p class="text-xs text-gray-400">{{ $client->company }}</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <p class="text-sm text-gray-700">{{ $client->email }}</p>
                        @if($client->phone)
                        <p class="text-xs text-gray-400">{{ $client->phone }}</p>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        <p class="text-sm text-gray-600">{{ $client->city ? $client->city . ', ' : '' }}{{ $client->country }}</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="text-sm font-medium text-gray-900">{{ $client->invoices_count }}</span>
                    </td>
                    <td class="px-4 py-4">
                        <span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                            {{ ucfirst($client->status) }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.clients.show', $client) }}"
                               class="text-xs px-2.5 py-1 rounded-md border border-gray-200 text-gray-600 hover:border-gray-300 hover:bg-gray-50 transition">
                                View
                            </a>
                            <a href="{{ route('admin.clients.edit', $client) }}"
                               class="text-xs px-2.5 py-1 rounded-md border text-white transition"
                               style="background:#61078B;border-color:#61078B;"
                               onmouseover="this.style.background='#7c22a8'"
                               onmouseout="this.style.background='#61078B'">
                                Edit
                            </a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete {{ addslashes($client->name) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="text-xs px-2.5 py-1 rounded-md border border-red-200 text-red-600 hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center">
                        <div class="text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                            <p class="text-sm">No clients found.</p>
                            <a href="{{ route('admin.clients.create') }}" class="text-sm underline mt-1 inline-block" style="color:#61078B;">Add your first client</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($clients->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $clients->links() }}
    </div>
    @endif
</div>

@endsection
