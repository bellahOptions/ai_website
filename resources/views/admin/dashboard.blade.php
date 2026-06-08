@extends('admin.layout')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

{{-- Stats row --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-2 mb-6">
    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Revenue</p>
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#f3e8ff;">
                <svg width="16" height="16" fill="#61078B" viewBox="0 0 20 20"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900">₦{{ number_format($stats['total_revenue'], 0) }}</p>
        <p class="text-xs text-gray-400 mt-1">From {{ $stats['paid_count'] }} paid invoices</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Outstanding</p>
            <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-orange-50">
                <svg width="16" height="16" fill="#f97316" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900">₦{{ number_format($stats['outstanding'], 0) }}</p>
        <p class="text-xs text-gray-400 mt-1">{{ $stats['sent_count'] + $stats['overdue_count'] }} pending invoices</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Clients</p>
            <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50">
                <svg width="16" height="16" fill="#3b82f6" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['total_clients'] }}</p>
        <p class="text-xs text-gray-400 mt-1">Registered clients</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Invoices</p>
            <div class="w-8 h-8 rounded-lg flex items-center justify-center bg-purple-50">
                <svg width="16" height="16" fill="#61078B" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-900">{{ $stats['total_invoices'] }}</p>
        <p class="text-xs text-gray-400 mt-1">{{ $stats['overdue_count'] }} overdue</p>
    </div>
</div>

{{-- Invoice status mini cards --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
    <div class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 flex items-center gap-3">
        <span class="badge badge-draft">Draft</span>
        <span class="text-lg font-bold text-gray-800">{{ $stats['draft_count'] }}</span>
    </div>
    <div class="bg-blue-50 border border-blue-100 rounded-lg px-4 py-3 flex items-center gap-3">
        <span class="badge badge-sent">Sent</span>
        <span class="text-lg font-bold text-gray-800">{{ $stats['sent_count'] }}</span>
    </div>
    <div class="bg-green-50 border border-green-100 rounded-lg px-4 py-3 flex items-center gap-3">
        <span class="badge badge-paid">Paid</span>
        <span class="text-lg font-bold text-gray-800">{{ $stats['paid_count'] }}</span>
    </div>
    <div class="bg-red-50 border border-red-100 rounded-lg px-4 py-3 flex items-center gap-3">
        <span class="badge badge-overdue">Overdue</span>
        <span class="text-lg font-bold text-gray-800">{{ $stats['overdue_count'] }}</span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Recent invoices --}}
    <div class="lg:col-span-2 bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h2 class="text-sm font-semibold text-gray-900">Recent Invoices</h2>
            <a href="{{ route('admin.invoices.create') }}"
               class="text-xs font-semibold px-3 py-1.5 rounded-lg text-white transition"
               style="background:#61078B;"
               onmouseover="this.style.background='#7c22a8'"
               onmouseout="this.style.background='#61078B'">
                + New Invoice
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Invoice</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Client</th>
                        <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                        <th class="text-right px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recent_invoices as $invoice)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-5 py-3.5">
                            <a href="{{ route('admin.invoices.show', $invoice) }}"
                               class="text-sm font-medium hover:underline" style="color:#61078B;">
                                {{ $invoice->invoice_number }}
                            </a>
                            <p class="text-xs text-gray-400">{{ $invoice->issue_date->format('M j, Y') }}</p>
                        </td>
                        <td class="px-4 py-3.5">
                            <p class="text-sm text-gray-900">{{ $invoice->client->name ?? '—' }}</p>
                        </td>
                        <td class="px-4 py-3.5">
                            <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <p class="text-sm font-semibold text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</p>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-5 py-8 text-center text-sm text-gray-400">No invoices yet. <a href="{{ route('admin.invoices.create') }}" class="underline" style="color:#61078B;">Create one</a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 border-t border-gray-100">
            <a href="{{ route('admin.invoices.index') }}" class="text-xs font-medium" style="color:#61078B;">View all invoices →</a>
        </div>
    </div>

    {{-- Recent clients --}}
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h2 class="text-sm font-semibold text-gray-900">Recent Clients</h2>
            <a href="{{ route('admin.clients.create') }}" class="text-xs font-medium" style="color:#61078B;">+ Add</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recent_clients as $client)
            <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-gray-50 transition-colors">
                <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-sm font-bold text-white" style="background:#61078B;">
                    {{ substr($client->name, 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ $client->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ $client->company ?? $client->email }}</p>
                </div>
                <span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                    {{ ucfirst($client->status) }}
                </span>
            </div>
            @empty
            <div class="px-5 py-8 text-center text-sm text-gray-400">No clients yet.</div>
            @endforelse
        </div>
        <div class="px-5 py-3 border-t border-gray-100">
            <a href="{{ route('admin.clients.index') }}" class="text-xs font-medium" style="color:#61078B;">View all clients →</a>
        </div>
    </div>

</div>

@endsection
