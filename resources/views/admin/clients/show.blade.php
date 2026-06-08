@extends('admin.layout')
@section('title', $client->name)
@section('page_title', 'Client Profile')

@section('content')

<div class="mt-2 mb-6 flex items-start justify-between">
    <div>
        <a href="{{ route('admin.clients.index') }}" class="text-sm flex items-center gap-1.5 text-gray-500 hover:text-gray-700 transition mb-3">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Back to Clients
        </a>
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-full flex items-center justify-center text-xl font-bold text-white shadow" style="background:#61078B;">
                {{ substr($client->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900">{{ $client->name }}</h2>
                <div class="flex items-center gap-2 mt-1">
                    @if($client->company)
                    <span class="text-sm text-gray-500">{{ $client->company }}</span>
                    <span class="text-gray-300">·</span>
                    @endif
                    <span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">{{ ucfirst($client->status) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center gap-2 mt-8">
        <a href="{{ route('admin.clients.edit', $client) }}"
           class="px-4 py-2 rounded-lg text-sm font-semibold text-white transition shadow-sm"
           style="background:#61078B;"
           onmouseover="this.style.background='#7c22a8'"
           onmouseout="this.style.background='#61078B'">
            Edit Client
        </a>
        <a href="{{ route('admin.invoices.create') }}?client_id={{ $client->id }}"
           class="px-4 py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
            + New Invoice
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Left: contact info + stats --}}
    <div class="space-y-5">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">Contact Info</h3>
            <dl class="space-y-3">
                <div>
                    <dt class="text-xs text-gray-400 mb-0.5">Email</dt>
                    <dd class="text-sm text-gray-900">
                        <a href="mailto:{{ $client->email }}" class="hover:underline" style="color:#61078B;">{{ $client->email }}</a>
                    </dd>
                </div>
                @if($client->phone)
                <div>
                    <dt class="text-xs text-gray-400 mb-0.5">Phone</dt>
                    <dd class="text-sm text-gray-900">{{ $client->phone }}</dd>
                </div>
                @endif
                @if($client->address || $client->city)
                <div>
                    <dt class="text-xs text-gray-400 mb-0.5">Address</dt>
                    <dd class="text-sm text-gray-900">
                        @if($client->address)<span class="block">{{ $client->address }}</span>@endif
                        {{ $client->city ? $client->city . ', ' : '' }}{{ $client->country }}
                    </dd>
                </div>
                @endif
                <div>
                    <dt class="text-xs text-gray-400 mb-0.5">Member since</dt>
                    <dd class="text-sm text-gray-900">{{ $client->created_at->format('M j, Y') }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-4">Billing Summary</h3>
            <dl class="space-y-3">
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Total Billed</dt>
                    <dd class="text-sm font-semibold text-gray-900">₦{{ number_format($client->totalBilled(), 2) }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-500">Total Paid</dt>
                    <dd class="text-sm font-semibold text-green-700">₦{{ number_format($client->totalPaid(), 2) }}</dd>
                </div>
                <div class="flex justify-between border-t border-gray-100 pt-3">
                    <dt class="text-sm text-gray-500">Outstanding</dt>
                    <dd class="text-sm font-semibold text-orange-600">₦{{ number_format($client->totalBilled() - $client->totalPaid(), 2) }}</dd>
                </div>
            </dl>
        </div>

        @if($client->notes)
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Notes</h3>
            <p class="text-sm text-gray-700 leading-relaxed">{{ $client->notes }}</p>
        </div>
        @endif
    </div>

    {{-- Right: invoice history --}}
    <div class="lg:col-span-2">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <h3 class="text-sm font-semibold text-gray-900">Invoice History</h3>
                <span class="text-xs text-gray-400">{{ $client->invoices->count() }} invoice{{ $client->invoices->count() !== 1 ? 's' : '' }}</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50">
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Invoice #</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Issue Date</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Due Date</th>
                            <th class="text-left px-4 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</th>
                            <th class="text-right px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($client->invoices->sortByDesc('created_at') as $invoice)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-3.5">
                                <a href="{{ route('admin.invoices.show', $invoice) }}"
                                   class="text-sm font-medium hover:underline" style="color:#61078B;">
                                    {{ $invoice->invoice_number }}
                                </a>
                            </td>
                            <td class="px-4 py-3.5 text-sm text-gray-600">{{ $invoice->issue_date->format('M j, Y') }}</td>
                            <td class="px-4 py-3.5 text-sm text-gray-600">
                                <span class="{{ $invoice->isOverdue() ? 'text-red-600 font-medium' : '' }}">
                                    {{ $invoice->due_date->format('M j, Y') }}
                                </span>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
                            </td>
                            <td class="px-5 py-3.5 text-right text-sm font-semibold text-gray-900">
                                {{ $invoice->currency }} {{ number_format($invoice->total, 2) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-5 py-10 text-center text-sm text-gray-400">
                                No invoices yet.
                                <a href="{{ route('admin.invoices.create') }}?client_id={{ $client->id }}" class="underline" style="color:#61078B;">Create one</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
