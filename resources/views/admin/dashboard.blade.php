@extends('admin.layout')
@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')

<div style="margin-top:8px;">

    {{-- Stats row --}}
    <div style="display:grid; grid-template-columns:repeat({{ auth()->user()->isSuperAdmin() ? 4 : 3 }},1fr); gap:16px; margin-bottom:20px;">
        <div class="stat-card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.06em; margin:0;">Total Revenue</p>
                <div style="width:34px;height:34px;border-radius:9px;background:#f3e8ff;display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" fill="#61078B" viewBox="0 0 20 20"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/></svg>
                </div>
            </div>
            <p style="font-size:26px;font-weight:700;color:#111827;margin:0;">₦{{ number_format($stats['total_revenue'], 0) }}</p>
            <p style="font-size:12px;color:#9ca3af;margin:5px 0 0;">{{ $stats['paid_count'] }} paid invoices</p>
        </div>

        <div class="stat-card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.06em; margin:0;">Outstanding</p>
                <div style="width:34px;height:34px;border-radius:9px;background:#fff7ed;display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" fill="#f97316" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                </div>
            </div>
            <p style="font-size:26px;font-weight:700;color:#111827;margin:0;">₦{{ number_format($stats['outstanding'], 0) }}</p>
            <p style="font-size:12px;color:#9ca3af;margin:5px 0 0;">{{ $stats['sent_count'] + $stats['overdue_count'] }} pending</p>
        </div>

        @if(auth()->user()->isSuperAdmin())
        <div class="stat-card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.06em; margin:0;">Total Clients</p>
                <div style="width:34px;height:34px;border-radius:9px;background:#eff6ff;display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" fill="#3b82f6" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                </div>
            </div>
            <p style="font-size:26px;font-weight:700;color:#111827;margin:0;">{{ $stats['total_clients'] }}</p>
            <p style="font-size:12px;color:#9ca3af;margin:5px 0 0;">Registered clients</p>
        </div>
        @endif

        <div class="stat-card">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:14px;">
                <p style="font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:.06em; margin:0;">Total Invoices</p>
                <div style="width:34px;height:34px;border-radius:9px;background:#f3e8ff;display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" fill="#61078B" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                </div>
            </div>
            <p style="font-size:26px;font-weight:700;color:#111827;margin:0;">{{ $stats['total_invoices'] }}</p>
            <p style="font-size:12px;color:#9ca3af;margin:5px 0 0;">{{ $stats['overdue_count'] }} overdue</p>
        </div>
    </div>

    {{-- Status pills row --}}
    <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:12px; margin-bottom:24px;">
        @foreach([
            ['label'=>'Draft',   'count'=>$stats['draft_count'],   'class'=>'badge-draft',   'bg'=>'#f9fafb'],
            ['label'=>'Sent',    'count'=>$stats['sent_count'],    'class'=>'badge-sent',    'bg'=>'#eff6ff'],
            ['label'=>'Paid',    'count'=>$stats['paid_count'],    'class'=>'badge-paid',    'bg'=>'#f0fdf4'],
            ['label'=>'Overdue', 'count'=>$stats['overdue_count'], 'class'=>'badge-overdue', 'bg'=>'#fef2f2'],
        ] as $s)
        <div style="background:{{ $s['bg'] }};border:1px solid #e9eaec;border-radius:10px;padding:12px 16px;display:flex;align-items:center;gap:10px;">
            <span class="badge {{ $s['class'] }}">{{ $s['label'] }}</span>
            <span style="font-size:18px;font-weight:700;color:#111827;">{{ $s['count'] }}</span>
        </div>
        @endforeach
    </div>

    {{-- Content grid --}}
    <div style="display:grid; grid-template-columns:{{ auth()->user()->isSuperAdmin() ? '1fr 320px' : '1fr' }}; gap:20px;">

        {{-- Recent invoices --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <span class="admin-card-title">Recent Invoices</span>
                <a href="{{ route('admin.invoices.create') }}" class="btn btn-primary btn-sm">+ New Invoice</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Invoice</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_invoices as $invoice)
                        <tr>
                            <td>
                                <a href="{{ route('admin.invoices.show', $invoice) }}"
                                   style="color:#61078B;font-weight:600;text-decoration:none;font-size:13.5px;">
                                    {{ $invoice->invoice_number }}
                                </a>
                                <div style="font-size:11.5px;color:#9ca3af;margin-top:1px;">{{ $invoice->issue_date->format('M j, Y') }}</div>
                            </td>
                            <td style="color:#374151;">{{ $invoice->client->name ?? '—' }}</td>
                            <td><span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span></td>
                            <td class="text-right" style="font-weight:600;color:#111827;">{{ $invoice->currencySymbol() }}{{ number_format($invoice->total, 2) }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="text-align:center;padding:32px;color:#9ca3af;font-size:13.5px;">
                            No invoices yet. <a href="{{ route('admin.invoices.create') }}" style="color:#61078B;">Create one</a>
                        </td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div style="padding:12px 20px;border-top:1px solid #f0f1f3;">
                <a href="{{ route('admin.invoices.index') }}" style="font-size:13px;color:#61078B;font-weight:500;text-decoration:none;">View all invoices →</a>
            </div>
        </div>

        @if(auth()->user()->isSuperAdmin())
        {{-- Recent clients --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <span class="admin-card-title">Recent Clients</span>
                <a href="{{ route('admin.clients.create') }}" style="font-size:13px;color:#61078B;text-decoration:none;font-weight:500;">+ Add</a>
            </div>
            <div>
                @forelse($recent_clients as $client)
                <div style="display:flex;align-items:center;gap:11px;padding:12px 20px;border-bottom:1px solid #f5f6f8;transition:background 100ms;"
                     onmouseover="this.style.background='#fafbff'" onmouseout="this.style.background=''">
                    <div style="width:34px;height:34px;border-radius:50%;background:#61078B;color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;">
                        {{ substr($client->name, 0, 1) }}
                    </div>
                    <div style="flex:1;min-width:0;">
                        <p style="font-size:13.5px;font-weight:600;color:#111827;margin:0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $client->name }}</p>
                        <p style="font-size:11.5px;color:#9ca3af;margin:2px 0 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $client->company ?? $client->email }}</p>
                    </div>
                    <span class="badge {{ $client->status === 'active' ? 'badge-active' : 'badge-inactive' }}">{{ ucfirst($client->status) }}</span>
                </div>
                @empty
                <div style="padding:32px;text-align:center;color:#9ca3af;font-size:13.5px;">No clients yet.</div>
                @endforelse
            </div>
            <div style="padding:12px 20px;border-top:1px solid #f0f1f3;">
                <a href="{{ route('admin.clients.index') }}" style="font-size:13px;color:#61078B;font-weight:500;text-decoration:none;">View all clients →</a>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
