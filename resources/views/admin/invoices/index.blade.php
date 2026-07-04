@extends('admin.layout')
@section('title', 'Invoices')
@section('page_title', 'Invoices')

@section('content')

<div class="page-header">
    <div>
        <h2>Invoices</h2>
        <p>{{ $invoices->total() }} total invoices</p>
    </div>
    <a href="{{ route('admin.invoices.create') }}" class="btn btn-primary">+ New Invoice</a>
</div>

{{-- Filters --}}
<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search invoice # or client…"
           class="form-input" style="flex:1;min-width:200px;max-width:340px;">
    <select name="status" class="form-input" style="width:160px;">
        <option value="">All Statuses</option>
        @foreach(['draft','sent','paid','overdue','cancelled'] as $s)
        <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-secondary">Filter</button>
    @if(request('search') || request('status'))
    <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">Clear</a>
    @endif
</form>

<div class="admin-card">
    <div style="overflow-x:auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Client</th>
                    <th>Issue Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th class="text-right">Total</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                <tr>
                    <td>
                        <a href="{{ route('admin.invoices.show', $invoice) }}"
                           style="color:#61078B;font-weight:600;text-decoration:none;font-size:13.5px;">
                            {{ $invoice->invoice_number }}
                        </a>
                        @if($invoice->isOverdue())
                        <div style="font-size:11.5px;color:#b91c1c;margin-top:1px;">Overdue</div>
                        @endif
                    </td>
                    <td>
                        @if($invoice->client)
                        <a href="{{ route('admin.clients.show', $invoice->client) }}"
                           style="color:#374151;text-decoration:none;font-size:13.5px;">{{ $invoice->client->name }}</a>
                        @else
                        <span style="color:#9ca3af;">—</span>
                        @endif
                    </td>
                    <td style="color:#6b7280;">{{ $invoice->issue_date->format('M j, Y') }}</td>
                    <td style="{{ $invoice->isOverdue() ? 'color:#b91c1c;font-weight:600;' : 'color:#6b7280;' }}">
                        {{ $invoice->due_date->format('M j, Y') }}
                    </td>
                    <td><span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span></td>
                    <td class="text-right" style="font-weight:600;color:#111827;">{{ $invoice->currencySymbol() }}{{ number_format($invoice->total, 2) }}</td>
                    <td class="text-right">
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:5px;">
                            <a href="{{ route('admin.invoices.show', $invoice) }}" class="btn btn-secondary btn-sm">View</a>

                            @if(in_array($invoice->status, ['draft', 'overdue']))
                            <form action="{{ route('admin.invoices.send', $invoice) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-blue btn-sm" type="submit"
                                        onclick="return confirm('Send {{ $invoice->invoice_number }} to {{ addslashes($invoice->client?->email ?? '') }}?')">
                                    Send
                                </button>
                            </form>
                            @endif

                            @if($invoice->status === 'sent')
                            <form action="{{ route('admin.invoices.mark-paid', $invoice) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-green btn-sm" type="submit"
                                        onclick="return confirm('Mark {{ $invoice->invoice_number }} as paid?')">
                                    Paid ✓
                                </button>
                            </form>
                            @endif

                            <a href="{{ route('admin.invoices.edit', $invoice) }}" class="btn btn-primary btn-sm">Edit</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:48px;">
                        <svg style="width:40px;height:40px;color:#d1d5db;display:block;margin:0 auto 12px;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                        <p style="font-size:14px;color:#9ca3af;margin:0 0 8px;">No invoices found.</p>
                        <a href="{{ route('admin.invoices.create') }}" style="color:#61078B;font-size:13.5px;">Create your first invoice →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($invoices->hasPages())
    <div style="padding:14px 20px;border-top:1px solid #f0f1f3;">{{ $invoices->links() }}</div>
    @endif
</div>

@endsection
