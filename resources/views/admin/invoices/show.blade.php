@extends('admin.layout')
@section('title', $invoice->invoice_number)
@section('page_title', 'Invoice Preview')

@push('styles')
<style>
    @media print {
        .no-print { display: none !important; }
        aside, header { display: none !important; }
        .ml-64 { margin-left: 0 !important; }
        body { background: white !important; }
        .invoice-card { border: none !important; box-shadow: none !important; }
    }
</style>
@endpush

@section('content')

<div class="mt-2 mb-6 flex items-start justify-between no-print">
    <div>
        <a href="{{ route('admin.invoices.index') }}" class="text-sm flex items-center gap-1.5 text-gray-500 hover:text-gray-700 transition">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Back to Invoices
        </a>
    </div>

    <div class="flex items-center gap-2">
        <button onclick="window.print()"
                class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
            Print
        </button>
        <a href="{{ route('admin.invoices.edit', $invoice) }}"
           class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit
        </a>
        @if(in_array($invoice->status, ['draft', 'overdue']))
        <form action="{{ route('admin.invoices.send', $invoice) }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                    class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-sm font-semibold text-white transition"
                    style="background:#3b82f6;"
                    onmouseover="this.style.background='#2563eb'"
                    onmouseout="this.style.background='#3b82f6'"
                    onclick="return confirm('Send invoice {{ $invoice->invoice_number }} to {{ $invoice->client?->email }}?')">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                Send Invoice
            </button>
        </form>
        @endif
        @if($invoice->status === 'sent')
        <form action="{{ route('admin.invoices.mark-paid', $invoice) }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                    class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-sm font-semibold text-white transition"
                    style="background:#16a34a;"
                    onmouseover="this.style.background='#15803d'"
                    onmouseout="this.style.background='#16a34a'"
                    onclick="return confirm('Mark invoice {{ $invoice->invoice_number }} as paid?')">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                Mark as Paid
            </button>
        </form>
        @endif
    </div>
</div>

{{-- Invoice card --}}
<div class="max-w-3xl mx-auto">
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden invoice-card">

        {{-- Header --}}
        <div class="px-8 pt-8 pb-6 border-b border-gray-100">
            <div class="flex items-start justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#61078B;">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
                        </div>
                        <p class="text-base font-bold text-gray-900">AI Digital Agency</p>
                    </div>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Lagos, Nigeria<br>
                        aidigitalagency08@gmail.com<br>
                        +234 707 777 6734
                    </p>
                </div>
                <div class="text-right">
                    <h1 class="text-2xl font-bold text-gray-900">INVOICE</h1>
                    <p class="text-sm font-semibold mt-1" style="color:#61078B;">{{ $invoice->invoice_number }}</p>
                    <div class="mt-2">
                        <span class="badge badge-{{ $invoice->status }} text-xs">{{ ucfirst($invoice->status) }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bill To + Dates --}}
        <div class="px-8 py-6 grid grid-cols-2 gap-6 border-b border-gray-100">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Bill To</p>
                @if($invoice->client)
                <p class="text-sm font-semibold text-gray-900">{{ $invoice->client->name }}</p>
                @if($invoice->client->company)
                <p class="text-sm text-gray-600">{{ $invoice->client->company }}</p>
                @endif
                <p class="text-sm text-gray-600">{{ $invoice->client->email }}</p>
                @if($invoice->client->phone)
                <p class="text-sm text-gray-600">{{ $invoice->client->phone }}</p>
                @endif
                @if($invoice->client->address)
                <p class="text-sm text-gray-600 mt-1">{{ $invoice->client->address }}</p>
                @endif
                @if($invoice->client->city)
                <p class="text-sm text-gray-600">{{ $invoice->client->city }}, {{ $invoice->client->country }}</p>
                @endif
                @else
                <p class="text-sm text-gray-400">No client assigned</p>
                @endif
            </div>
            <div class="text-right">
                <dl class="space-y-1">
                    <div>
                        <dt class="text-xs text-gray-400">Issue Date</dt>
                        <dd class="text-sm font-medium text-gray-900">{{ $invoice->issue_date->format('F j, Y') }}</dd>
                    </div>
                    <div class="mt-2">
                        <dt class="text-xs text-gray-400">Due Date</dt>
                        <dd class="text-sm font-medium {{ $invoice->isOverdue() ? 'text-red-600' : 'text-gray-900' }}">
                            {{ $invoice->due_date->format('F j, Y') }}
                            @if($invoice->isOverdue())<span class="text-xs text-red-500 ml-1">(Overdue)</span>@endif
                        </dd>
                    </div>
                    @if($invoice->paid_at)
                    <div class="mt-2">
                        <dt class="text-xs text-gray-400">Paid On</dt>
                        <dd class="text-sm font-medium text-green-700">{{ $invoice->paid_at->format('F j, Y') }}</dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>

        {{-- Line items --}}
        <div class="px-8 py-6 border-b border-gray-100">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left pb-3 text-xs font-semibold text-gray-400 uppercase tracking-wide">Description</th>
                        <th class="text-center pb-3 text-xs font-semibold text-gray-400 uppercase tracking-wide w-16">Qty</th>
                        <th class="text-right pb-3 text-xs font-semibold text-gray-400 uppercase tracking-wide w-28">Unit Price</th>
                        <th class="text-right pb-3 text-xs font-semibold text-gray-400 uppercase tracking-wide w-28">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($invoice->items as $item)
                    <tr>
                        <td class="py-3 text-sm text-gray-900">{{ $item->description }}</td>
                        <td class="py-3 text-sm text-gray-600 text-center">{{ $item->quantity }}</td>
                        <td class="py-3 text-sm text-gray-600 text-right">{{ $invoice->currency }} {{ number_format($item->unit_price, 2) }}</td>
                        <td class="py-3 text-sm font-medium text-gray-900 text-right">{{ $invoice->currency }} {{ number_format($item->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Totals --}}
        <div class="px-8 py-6 border-b border-gray-100">
            <div class="max-w-xs ml-auto space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Subtotal</span>
                    <span class="text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</span>
                </div>
                @if($invoice->tax_rate > 0)
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Tax ({{ number_format($invoice->tax_rate, 1) }}%)</span>
                    <span class="text-gray-900">{{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}</span>
                </div>
                @endif
                @if($invoice->discount > 0)
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Discount</span>
                    <span class="text-red-600">− {{ $invoice->currency }} {{ number_format($invoice->discount, 2) }}</span>
                </div>
                @endif
                <div class="border-t border-gray-200 pt-2 flex justify-between">
                    <span class="text-base font-bold text-gray-900">Total Due</span>
                    <span class="text-base font-bold" style="color:#61078B;">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</span>
                </div>
                @if($invoice->status === 'paid')
                <div class="mt-2 bg-green-50 border border-green-200 rounded-lg px-4 py-2 text-center">
                    <p class="text-sm font-bold text-green-700">✓ PAID</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Notes & Terms --}}
        @if($invoice->notes || $invoice->terms)
        <div class="px-8 py-6 grid {{ $invoice->notes && $invoice->terms ? 'grid-cols-2' : 'grid-cols-1' }} gap-6">
            @if($invoice->notes)
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Notes</p>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $invoice->notes }}</p>
            </div>
            @endif
            @if($invoice->terms)
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Terms & Conditions</p>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $invoice->terms }}</p>
            </div>
            @endif
        </div>
        @endif

        {{-- Footer --}}
        <div class="px-8 py-4 bg-gray-50 text-center">
            <p class="text-xs text-gray-400">Thank you for your business — AI Digital Agency · aidigitalagency08@gmail.com</p>
        </div>
    </div>

    {{-- Danger zone --}}
    <div class="mt-6 no-print">
        <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" class="inline"
              onsubmit="return confirm('Permanently delete invoice {{ $invoice->invoice_number }}? This cannot be undone.')">
            @csrf @method('DELETE')
            <button type="submit" class="text-xs text-red-500 hover:text-red-700 transition">
                Delete invoice
            </button>
        </form>
    </div>
</div>

@endsection
