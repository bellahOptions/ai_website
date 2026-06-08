@extends('admin.layout')
@section('title', 'Invoices')
@section('page_title', 'Invoices')

@section('content')

<div class="flex items-center justify-between mt-2 mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-900">Invoices</h2>
        <p class="text-sm text-gray-500 mt-0.5">{{ $invoices->total() }} total invoices</p>
    </div>
    <a href="{{ route('admin.invoices.create') }}"
       class="px-4 py-2 rounded-lg text-sm font-semibold text-white shadow-sm transition"
       style="background:#61078B;"
       onmouseover="this.style.background='#7c22a8'"
       onmouseout="this.style.background='#61078B'">
        + New Invoice
    </a>
</div>

{{-- Filters --}}
<form method="GET" class="flex flex-col sm:flex-row gap-3 mb-5">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search invoice # or client…"
           class="flex-1 px-3.5 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
    <select name="status" class="px-3.5 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
        <option value="">All Statuses</option>
        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="sent" {{ request('status') === 'sent' ? 'selected' : '' }}>Sent</option>
        <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Paid</option>
        <option value="overdue" {{ request('status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>
    <button type="submit" class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">Filter</button>
    @if(request('search') || request('status'))
    <a href="{{ route('admin.invoices.index') }}" class="px-4 py-2 text-sm text-gray-500 hover:text-gray-700 transition flex items-center">Clear</a>
    @endif
</form>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50">
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Invoice</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Client</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Issue Date</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Due Date</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Total</th>
                    <th class="text-right px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($invoices as $invoice)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-5 py-4">
                        <a href="{{ route('admin.invoices.show', $invoice) }}"
                           class="text-sm font-semibold hover:underline" style="color:#61078B;">
                            {{ $invoice->invoice_number }}
                        </a>
                        @if($invoice->isOverdue())
                        <p class="text-xs text-red-500 mt-0.5">Overdue</p>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        @if($invoice->client)
                        <a href="{{ route('admin.clients.show', $invoice->client) }}"
                           class="text-sm text-gray-700 hover:underline">
                            {{ $invoice->client->name }}
                        </a>
                        @else
                        <span class="text-sm text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600">{{ $invoice->issue_date->format('M j, Y') }}</td>
                    <td class="px-4 py-4 text-sm {{ $invoice->isOverdue() ? 'text-red-600 font-medium' : 'text-gray-600' }}">
                        {{ $invoice->due_date->format('M j, Y') }}
                    </td>
                    <td class="px-4 py-4">
                        <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
                    </td>
                    <td class="px-4 py-4 text-right text-sm font-semibold text-gray-900">
                        {{ $invoice->currency }} {{ number_format($invoice->total, 2) }}
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex items-center justify-end gap-1.5">
                            <a href="{{ route('admin.invoices.show', $invoice) }}"
                               class="text-xs px-2.5 py-1 rounded-md border border-gray-200 text-gray-600 hover:bg-gray-50 transition">
                                View
                            </a>
                            @if(in_array($invoice->status, ['draft', 'overdue']))
                            <form action="{{ route('admin.invoices.send', $invoice) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="text-xs px-2.5 py-1 rounded-md border border-blue-200 text-blue-700 hover:bg-blue-50 transition"
                                        onclick="return confirm('Send invoice {{ $invoice->invoice_number }} to {{ addslashes($invoice->client?->email ?? '') }}?')">
                                    Send
                                </button>
                            </form>
                            @endif
                            @if($invoice->status === 'sent')
                            <form action="{{ route('admin.invoices.mark-paid', $invoice) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="text-xs px-2.5 py-1 rounded-md border border-green-200 text-green-700 hover:bg-green-50 transition"
                                        onclick="return confirm('Mark invoice {{ $invoice->invoice_number }} as paid?')">
                                    Paid
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('admin.invoices.edit', $invoice) }}"
                               class="text-xs px-2.5 py-1 rounded-md border text-white transition"
                               style="background:#61078B;border-color:#61078B;"
                               onmouseover="this.style.background='#7c22a8'"
                               onmouseout="this.style.background='#61078B'">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center">
                        <div class="text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                            <p class="text-sm">No invoices found.</p>
                            <a href="{{ route('admin.invoices.create') }}" class="text-sm underline mt-1 inline-block" style="color:#61078B;">Create your first invoice</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($invoices->hasPages())
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $invoices->links() }}
    </div>
    @endif
</div>

@endsection
