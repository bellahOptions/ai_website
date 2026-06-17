<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceIssued;
use App\Mail\InvoicePaymentConfirmed;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with('client');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('invoice_number', 'like', '%' . $request->search . '%')
                  ->orWhereHas('client', fn($c) => $c->where('name', 'like', '%' . $request->search . '%'));
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        $invoices = $query->orderByDesc('created_at')->paginate(15)->withQueryString();
        $clients  = Client::orderBy('name')->get();

        return view('admin.invoices.index', compact('invoices', 'clients'));
    }

    public function create()
    {
        $clients = Client::where('status', 'active')->orderBy('name')->get();
        return view('admin.invoices.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id'   => ['required', 'exists:clients,id'],
            'issue_date'  => ['required', 'date'],
            'due_date'    => ['required', 'date', 'after_or_equal:issue_date'],
            'tax_rate'    => ['nullable', 'numeric', 'min:0', 'max:100'],
            'discount'    => ['nullable', 'numeric', 'min:0'],
            'currency'    => ['nullable', 'string', 'max:3'],
            'notes'       => ['nullable', 'string'],
            'terms'       => ['nullable', 'string'],
            'items'       => ['required', 'array', 'min:1'],
            'items.*.description' => ['required', 'string'],
            'items.*.unit_price'  => ['required', 'numeric', 'min:0'],
            'items.*.discount'    => ['nullable', 'numeric', 'min:0'],
            'items.*.apply_vat'   => ['nullable'],
        ]);

        DB::transaction(function () use ($data, $request) {
            $invoice = Invoice::create([
                'invoice_number' => Invoice::generateNumber(),
                'client_id'      => $data['client_id'],
                'status'         => 'draft',
                'issue_date'     => $data['issue_date'],
                'due_date'       => $data['due_date'],
                'tax_rate'       => 0,
                'discount'       => $data['discount'] ?? 0,
                'currency'       => $data['currency'] ?? 'NGN',
                'notes'          => $data['notes'] ?? null,
                'terms'          => $data['terms'] ?? null,
                'subtotal'       => 0,
                'tax_amount'     => 0,
                'total'          => 0,
            ]);

            foreach ($data['items'] as $i => $item) {
                InvoiceItem::create([
                    'invoice_id'  => $invoice->id,
                    'description' => $item['description'],
                    'quantity'    => 1,
                    'unit_price'  => $item['unit_price'],
                    'discount'    => $item['discount'] ?? 0,
                    'apply_vat'   => !empty($item['apply_vat']),
                    'sort_order'  => $i,
                ]);
            }

            $invoice->recalculate();
        });

        return redirect()->route('admin.invoices.index')
                         ->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);
        return view('admin.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $invoice->load('items');
        $clients = Client::where('status', 'active')->orderBy('name')->get();
        return view('admin.invoices.edit', compact('invoice', 'clients'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'client_id'   => ['required', 'exists:clients,id'],
            'status'      => ['required', 'in:draft,sent,paid,overdue,cancelled'],
            'issue_date'  => ['required', 'date'],
            'due_date'    => ['required', 'date', 'after_or_equal:issue_date'],
            'tax_rate'    => ['nullable', 'numeric', 'min:0', 'max:100'],
            'discount'    => ['nullable', 'numeric', 'min:0'],
            'currency'    => ['nullable', 'string', 'max:3'],
            'notes'       => ['nullable', 'string'],
            'terms'       => ['nullable', 'string'],
            'items'       => ['required', 'array', 'min:1'],
            'items.*.description' => ['required', 'string'],
            'items.*.unit_price'  => ['required', 'numeric', 'min:0'],
            'items.*.discount'    => ['nullable', 'numeric', 'min:0'],
            'items.*.apply_vat'   => ['nullable'],
        ]);

        DB::transaction(function () use ($invoice, $data) {
            $invoice->update([
                'client_id'  => $data['client_id'],
                'status'     => $data['status'],
                'issue_date' => $data['issue_date'],
                'due_date'   => $data['due_date'],
                'tax_rate'   => 0,
                'discount'   => $data['discount'] ?? 0,
                'currency'   => $data['currency'] ?? 'NGN',
                'notes'      => $data['notes'] ?? null,
                'terms'      => $data['terms'] ?? null,
            ]);

            $invoice->items()->delete();

            foreach ($data['items'] as $i => $item) {
                InvoiceItem::create([
                    'invoice_id'  => $invoice->id,
                    'description' => $item['description'],
                    'quantity'    => 1,
                    'unit_price'  => $item['unit_price'],
                    'discount'    => $item['discount'] ?? 0,
                    'apply_vat'   => !empty($item['apply_vat']),
                    'sort_order'  => $i,
                ]);
            }

            $invoice->recalculate();
        });

        return redirect()->route('admin.invoices.show', $invoice)
                         ->with('success', 'Invoice updated.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index')
                         ->with('success', 'Invoice deleted.');
    }

    public function downloadPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);
        $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $invoice])->setPaper('a4', 'portrait');
        return $pdf->download($invoice->invoice_number . '.pdf');
    }

    public function send(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);

        if (!in_array($invoice->status, ['draft', 'overdue'])) {
            return back()->with('error', 'Only draft invoices can be sent.');
        }

        try {
            Mail::to($invoice->client->email)->send(new InvoiceIssued($invoice));
            $invoice->update(['status' => 'sent', 'sent_at' => now()]);
            return back()->with('success', 'Invoice sent to ' . $invoice->client->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function markPaid(Invoice $invoice)
    {
        if ($invoice->status === 'paid') {
            return back()->with('error', 'Invoice is already paid.');
        }

        $invoice->load('client');

        try {
            $invoice->update(['status' => 'paid', 'paid_at' => now()]);
            Mail::to($invoice->client->email)->send(new InvoicePaymentConfirmed($invoice));
            return back()->with('success', 'Invoice marked as paid and client notified.');
        } catch (\Exception $e) {
            return back()->with('error', 'Invoice marked paid, but email notification failed.');
        }
    }
}
