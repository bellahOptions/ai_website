@extends('admin.layout')
@section('title', $client->name)
@section('page_title', 'Client Profile')

@section('content')

<div style="margin-top:4px;">
    <a href="{{ route('admin.clients.index') }}" class="back-link">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Clients
    </a>

    <div class="page-header" style="margin-top:10px;align-items:center;">
        <div style="display:flex;align-items:center;gap:16px;">
            <div style="width:52px;height:52px;border-radius:50%;background:#61078B;color:#fff;display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:700;flex-shrink:0;">
                {{ substr($client->name, 0, 1) }}
            </div>
            <div>
                <h2 style="margin:0;">{{ $client->name }}</h2>
                <div style="display:flex;align-items:center;gap:8px;margin-top:5px;">
                    @if($client->company)<span style="font-size:13.5px;color:#6b7280;">{{ $client->company }}</span><span style="color:#d1d5db;">·</span>@endif
                    <span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">{{ ucfirst($client->status) }}</span>
                </div>
            </div>
        </div>
        <div style="display:flex;gap:8px;">
            <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-primary">Edit Client</a>
            <a href="{{ route('admin.invoices.create') }}?client_id={{ $client->id }}" class="btn btn-secondary">+ New Invoice</a>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:280px 1fr;gap:20px;">

    {{-- Left column --}}
    <div style="display:flex;flex-direction:column;gap:16px;">

        {{-- Contact info --}}
        <div class="admin-card" style="padding:20px;">
            <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 14px;">Contact Info</p>
            <dl style="display:flex;flex-direction:column;gap:12px;margin:0;">
                <div>
                    <dt style="font-size:11.5px;color:#9ca3af;margin-bottom:2px;">Email</dt>
                    <dd style="margin:0;"><a href="mailto:{{ $client->email }}" style="font-size:13.5px;color:#61078B;text-decoration:none;">{{ $client->email }}</a></dd>
                </div>
                @if($client->phone)
                <div>
                    <dt style="font-size:11.5px;color:#9ca3af;margin-bottom:2px;">Phone</dt>
                    <dd style="margin:0;font-size:13.5px;color:#374151;">{{ $client->phone }}</dd>
                </div>
                @endif
                @if($client->address || $client->city)
                <div>
                    <dt style="font-size:11.5px;color:#9ca3af;margin-bottom:2px;">Address</dt>
                    <dd style="margin:0;font-size:13.5px;color:#374151;line-height:1.5;">
                        @if($client->address)<span style="display:block;">{{ $client->address }}</span>@endif
                        {{ $client->city ? "{$client->city}, " : '' }}{{ $client->country }}
                    </dd>
                </div>
                @endif
                <div>
                    <dt style="font-size:11.5px;color:#9ca3af;margin-bottom:2px;">Member since</dt>
                    <dd style="margin:0;font-size:13.5px;color:#374151;">{{ $client->created_at->format('M j, Y') }}</dd>
                </div>
            </dl>
        </div>

        {{-- Billing summary --}}
        <div class="admin-card" style="padding:20px;">
            <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 14px;">Billing Summary</p>
            <div style="display:flex;flex-direction:column;gap:10px;">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Total Billed</span>
                    <span style="font-size:13.5px;font-weight:600;color:#111827;">₦{{ number_format($client->totalBilled(), 2) }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Total Paid</span>
                    <span style="font-size:13.5px;font-weight:600;color:#15803d;">₦{{ number_format($client->totalPaid(), 2) }}</span>
                </div>
                <div style="border-top:1px solid #f0f1f3;padding-top:10px;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Outstanding</span>
                    <span style="font-size:13.5px;font-weight:600;color:#ea580c;">₦{{ number_format($client->totalBilled() - $client->totalPaid(), 2) }}</span>
                </div>
            </div>
        </div>

        @if($client->notes)
        <div class="admin-card" style="padding:20px;">
            <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 10px;">Notes</p>
            <p style="font-size:13.5px;color:#374151;line-height:1.6;margin:0;">{{ $client->notes }}</p>
        </div>
        @endif
    </div>

    {{-- Invoice history --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <span class="admin-card-title">Invoice History</span>
            <span style="font-size:12px;color:#9ca3af;">{{ $client->invoices->count() }} invoice{{ $client->invoices->count() !== 1 ? 's' : '' }}</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Invoice #</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($client->invoices->sortByDesc('created_at') as $invoice)
                    <tr>
                        <td>
                            <a href="{{ route('admin.invoices.show', $invoice) }}" style="color:#61078B;font-weight:600;text-decoration:none;">
                                {{ $invoice->invoice_number }}
                            </a>
                        </td>
                        <td style="color:#6b7280;">{{ $invoice->issue_date->format('M j, Y') }}</td>
                        <td>
                            <span style="font-size:13.5px;{{ $invoice->isOverdue() ? 'color:#b91c1c;font-weight:600;' : 'color:#6b7280;' }}">
                                {{ $invoice->due_date->format('M j, Y') }}
                            </span>
                        </td>
                        <td><span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span></td>
                        <td class="text-right" style="font-weight:600;color:#111827;">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:40px;color:#9ca3af;font-size:13.5px;">
                            No invoices yet. <a href="{{ route('admin.invoices.create') }}?client_id={{ $client->id }}" style="color:#61078B;">Create one</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
