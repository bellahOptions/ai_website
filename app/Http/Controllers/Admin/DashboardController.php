<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients'   => Client::count(),
            'total_invoices'  => Invoice::count(),
            'total_revenue'   => Invoice::where('status', 'paid')->sum('total'),
            'outstanding'     => Invoice::whereIn('status', ['sent', 'overdue'])->sum('total'),
            'draft_count'     => Invoice::where('status', 'draft')->count(),
            'sent_count'      => Invoice::where('status', 'sent')->count(),
            'paid_count'      => Invoice::where('status', 'paid')->count(),
            'overdue_count'   => Invoice::where('status', 'overdue')->count(),
        ];

        $recent_invoices = Invoice::with('client')
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $recent_clients = Client::orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_invoices', 'recent_clients'));
    }
}
