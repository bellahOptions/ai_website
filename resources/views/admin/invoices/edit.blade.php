@extends('admin.layout')
@section('title', 'Edit ' . $invoice->invoice_number)
@section('page_title', 'Edit Invoice')

@section('content')

<div style="margin-top:4px;">
    <a href="{{ route('admin.invoices.show', $invoice) }}" class="back-link">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to {{ $invoice->invoice_number }}
    </a>
    <div class="page-header" style="margin-top:6px;align-items:center;">
        <div style="display:flex;align-items:center;gap:10px;">
            <h2 style="margin:0;">Edit Invoice</h2>
            <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
        </div>
    </div>
</div>

<form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" id="invoice-form">
@csrf @method('PUT')

<div style="display:grid;grid-template-columns:1fr 300px;gap:20px;align-items:start;">

    {{-- Left --}}
    <div style="display:flex;flex-direction:column;gap:16px;">

        <div class="admin-card" style="padding:24px;">
            <p style="font-size:13px;font-weight:600;color:#374151;margin:0 0 18px;">Invoice Details</p>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="form-group">
                    <label class="form-label">Client <span class="req">*</span></label>
                    <select name="client_id" required class="form-input">
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $invoice->client_id) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}@if($client->company) — {{ $client->company }}@endif
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input">
                        @foreach(['draft','sent','paid','overdue','cancelled'] as $s)
                        <option value="{{ $s }}" {{ old('status', $invoice->status) === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-input">
                        @foreach(['NGN'=>'NGN — Nigerian Naira','USD'=>'USD — US Dollar','GBP'=>'GBP — British Pound','EUR'=>'EUR — Euro'] as $code => $label)
                        <option value="{{ $code }}" {{ old('currency',$invoice->currency) === $code ? 'selected':'' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div></div>
                <div class="form-group">
                    <label class="form-label">Issue Date <span class="req">*</span></label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', $invoice->issue_date->format('Y-m-d')) }}" required class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Due Date <span class="req">*</span></label>
                    <input type="date" name="due_date" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}" required class="form-input">
                </div>
            </div>
        </div>

        {{-- Line items --}}
        <div class="admin-card" style="padding:24px;">
            <p style="font-size:13px;font-weight:600;color:#374151;margin:0 0 16px;">Line Items</p>

            <div style="display:grid;grid-template-columns:1fr 80px 130px 100px 32px;gap:8px;align-items:center;margin-bottom:8px;">
                <span style="font-size:11.5px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.04em;">Description</span>
                <span style="font-size:11.5px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.04em;">Qty</span>
                <span style="font-size:11.5px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.04em;">Unit Price</span>
                <span style="font-size:11.5px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.04em;text-align:right;">Total</span>
                <span></span>
            </div>

            <div id="items-container" style="display:flex;flex-direction:column;gap:8px;">
                @php $existingItems = old('items') ? collect(old('items'))->values() : $invoice->items; @endphp
                @foreach($existingItems as $i => $item)
                @php
                    $desc  = is_array($item) ? ($item['description'] ?? '') : $item->description;
                    $qty   = is_array($item) ? ($item['quantity']    ?? 1)  : $item->quantity;
                    $price = is_array($item) ? ($item['unit_price']  ?? 0)  : $item->unit_price;
                @endphp
                <div class="item-row" style="display:grid;grid-template-columns:1fr 80px 130px 100px 32px;gap:8px;align-items:center;">
                    <input type="text"   name="items[{{ $i }}][description]" value="{{ $desc }}"  required placeholder="Service description" class="form-input">
                    <input type="number" name="items[{{ $i }}][quantity]"    value="{{ $qty }}"   min="1" required class="form-input item-qty">
                    <input type="number" name="items[{{ $i }}][unit_price]"  value="{{ $price }}" min="0" step="0.01" required class="form-input item-price">
                    <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#111827;padding:9px 0;">{{ number_format($qty * $price, 2) }}</div>
                    @if(!$loop->first)
                    <button type="button" class="remove-item" style="width:28px;height:28px;border:none;background:#fff0f0;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#ef4444;font-size:16px;padding:0;">×</button>
                    @else
                    <div style="width:28px;"></div>
                    @endif
                </div>
                @endforeach
            </div>

            <button type="button" id="add-item"
                    style="margin-top:14px;background:none;border:none;cursor:pointer;font-size:13.5px;color:#61078B;font-weight:600;padding:0;display:flex;align-items:center;gap:6px;font-family:inherit;">
                <span style="font-size:18px;line-height:1;">+</span> Add Line Item
            </button>
        </div>

        <div class="admin-card" style="padding:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="form-group">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" rows="3" class="form-input">{{ old('notes', $invoice->notes) }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Terms & Conditions</label>
                    <textarea name="terms" rows="3" class="form-input">{{ old('terms', $invoice->terms) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Right: Summary --}}
    <div style="position:sticky;top:70px;">
        <div class="admin-card" style="padding:22px;">
            <p style="font-size:13px;font-weight:600;color:#374151;margin:0 0 16px;">Summary</p>

            <div style="display:flex;flex-direction:column;gap:12px;">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Subtotal</span>
                    <span style="font-size:13.5px;font-weight:600;color:#111827;" id="preview-subtotal">{{ number_format($invoice->subtotal, 2) }}</span>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size:12px;">Tax Rate (%)</label>
                    <input type="number" name="tax_rate" value="{{ old('tax_rate', $invoice->tax_rate) }}" min="0" max="100" step="0.01"
                           id="tax-rate-input" class="form-input" style="font-size:13px;">
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Tax Amount</span>
                    <span style="font-size:13.5px;color:#374151;" id="preview-tax">{{ number_format($invoice->tax_amount, 2) }}</span>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size:12px;">Discount</label>
                    <input type="number" name="discount" value="{{ old('discount', $invoice->discount) }}" min="0" step="0.01"
                           id="discount-input" class="form-input" style="font-size:13px;">
                </div>

                <div style="border-top:2px solid #f0f1f3;padding-top:12px;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:14px;font-weight:700;color:#111827;">Total Due</span>
                    <span style="font-size:18px;font-weight:700;color:#61078B;" id="preview-total">{{ number_format($invoice->total, 2) }}</span>
                </div>
            </div>

            <div style="margin-top:20px;display:flex;flex-direction:column;gap:8px;">
                <button type="submit" class="btn btn-primary" style="justify-content:center;">Save Changes</button>
                <a href="{{ route('admin.invoices.show', $invoice) }}" class="btn btn-secondary" style="justify-content:center;">Cancel</a>
            </div>
        </div>
    </div>

</div>
</form>

@push('scripts')
<script>
let itemIndex = {{ old('items') ? count(old('items')) : $invoice->items->count() }};

function recalculate() {
    let subtotal = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const qty   = parseFloat(row.querySelector('.item-qty')?.value)   || 0;
        const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
        const total = qty * price;
        const el = row.querySelector('.item-total');
        if (el) el.textContent = total.toFixed(2);
        subtotal += total;
    });
    const tax      = subtotal * ((parseFloat(document.getElementById('tax-rate-input').value) || 0) / 100);
    const discount = parseFloat(document.getElementById('discount-input').value) || 0;
    document.getElementById('preview-subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('preview-tax').textContent      = tax.toFixed(2);
    document.getElementById('preview-total').textContent    = Math.max(0, subtotal + tax - discount).toFixed(2);
}

function makeRow(index) {
    const div = document.createElement('div');
    div.className = 'item-row';
    div.style.cssText = 'display:grid;grid-template-columns:1fr 80px 130px 100px 32px;gap:8px;align-items:center;';
    div.innerHTML = `
        <input type="text"   name="items[${index}][description]" required placeholder="Service description" class="form-input">
        <input type="number" name="items[${index}][quantity]"    value="1" min="1" required class="form-input item-qty">
        <input type="number" name="items[${index}][unit_price]"  min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
        <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#111827;padding:9px 0;">0.00</div>
        <button type="button" class="remove-item" style="width:28px;height:28px;border:none;background:#fff0f0;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#ef4444;font-size:16px;padding:0;">×</button>
    `;
    div.querySelectorAll('.item-qty,.item-price').forEach(i => i.addEventListener('input', recalculate));
    div.querySelector('.remove-item').addEventListener('click', () => { div.remove(); recalculate(); });
    return div;
}

document.getElementById('add-item').addEventListener('click', () => {
    document.getElementById('items-container').appendChild(makeRow(itemIndex++));
    recalculate();
});

document.querySelectorAll('.item-row').forEach(row => {
    row.querySelectorAll('.item-qty,.item-price').forEach(i => i.addEventListener('input', recalculate));
    const rb = row.querySelector('.remove-item');
    if (rb) rb.addEventListener('click', () => { row.remove(); recalculate(); });
});
document.getElementById('tax-rate-input').addEventListener('input', recalculate);
document.getElementById('discount-input').addEventListener('input', recalculate);
</script>
@endpush

@endsection
