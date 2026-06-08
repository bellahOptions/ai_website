@extends('admin.layout')
@section('title', 'New Invoice')
@section('page_title', 'New Invoice')

@section('content')

<div style="margin-top:4px;">
    <a href="{{ route('admin.invoices.index') }}" class="back-link">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Invoices
    </a>
    <div class="page-header" style="margin-top:6px;">
        <div><h2>Create New Invoice</h2></div>
    </div>
</div>

<form action="{{ route('admin.invoices.store') }}" method="POST" id="invoice-form">
@csrf

<div style="display:grid;grid-template-columns:1fr 300px;gap:20px;align-items:start;">

    {{-- Left --}}
    <div style="display:flex;flex-direction:column;gap:16px;">

        {{-- Invoice details --}}
        <div class="admin-card" style="padding:24px;">
            <p style="font-size:13px;font-weight:600;color:#374151;margin:0 0 18px;">Invoice Details</p>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="form-group">
                    <label class="form-label">Client <span class="req">*</span></label>
                    <select name="client_id" required class="form-input">
                        <option value="">Select a client…</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', request('client_id')) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}@if($client->company) — {{ $client->company }}@endif
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-input">
                        <option value="NGN" {{ old('currency','NGN') === 'NGN' ? 'selected':'' }}>NGN — Nigerian Naira</option>
                        <option value="USD" {{ old('currency') === 'USD' ? 'selected':'' }}>USD — US Dollar</option>
                        <option value="GBP" {{ old('currency') === 'GBP' ? 'selected':'' }}>GBP — British Pound</option>
                        <option value="EUR" {{ old('currency') === 'EUR' ? 'selected':'' }}>EUR — Euro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Issue Date <span class="req">*</span></label>
                    <input type="date" name="issue_date" value="{{ old('issue_date', date('Y-m-d')) }}" required class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Due Date <span class="req">*</span></label>
                    <input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+30 days'))) }}" required class="form-input">
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
                @if(old('items'))
                    @foreach(old('items') as $i => $item)
                    <div class="item-row" style="display:grid;grid-template-columns:1fr 80px 130px 100px 32px;gap:8px;align-items:center;">
                        <input type="text" name="items[{{ $i }}][description]" value="{{ $item['description'] ?? '' }}" required placeholder="Service description" class="form-input">
                        <input type="number" name="items[{{ $i }}][quantity]" value="{{ $item['quantity'] ?? 1 }}" min="1" required class="form-input item-qty">
                        <input type="number" name="items[{{ $i }}][unit_price]" value="{{ $item['unit_price'] ?? '' }}" min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
                        <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#111827;padding:9px 0;">{{ number_format(($item['quantity']??1)*($item['unit_price']??0),2) }}</div>
                        <button type="button" class="remove-item" style="width:28px;height:28px;border:none;background:#fff0f0;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#ef4444;font-size:15px;padding:0;" {{ $loop->first ? 'style="visibility:hidden"' : '' }}>×</button>
                    </div>
                    @endforeach
                @else
                <div class="item-row" style="display:grid;grid-template-columns:1fr 80px 130px 100px 32px;gap:8px;align-items:center;">
                    <input type="text" name="items[0][description]" required placeholder="Service description" class="form-input">
                    <input type="number" name="items[0][quantity]" value="1" min="1" required class="form-input item-qty">
                    <input type="number" name="items[0][unit_price]" min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
                    <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#111827;padding:9px 0;">0.00</div>
                    <div style="width:28px;"></div>
                </div>
                @endif
            </div>

            <button type="button" id="add-item"
                    style="margin-top:14px;background:none;border:none;cursor:pointer;font-size:13.5px;color:#61078B;font-weight:600;padding:0;display:flex;align-items:center;gap:6px;font-family:inherit;">
                <span style="font-size:18px;line-height:1;">+</span> Add Line Item
            </button>
        </div>

        {{-- Notes & Terms --}}
        <div class="admin-card" style="padding:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div class="form-group">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" rows="3" class="form-input" placeholder="Thank you for your business…">{{ old('notes') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Terms & Conditions</label>
                    <textarea name="terms" rows="3" class="form-input" placeholder="Payment due within 30 days…">{{ old('terms') }}</textarea>
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
                    <span style="font-size:13.5px;font-weight:600;color:#111827;" id="preview-subtotal">0.00</span>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size:12px;">Tax Rate (%)</label>
                    <input type="number" name="tax_rate" value="{{ old('tax_rate',0) }}" min="0" max="100" step="0.01"
                           id="tax-rate-input" class="form-input" style="font-size:13px;">
                </div>

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">Tax Amount</span>
                    <span style="font-size:13.5px;color:#374151;" id="preview-tax">0.00</span>
                </div>

                <div class="form-group">
                    <label class="form-label" style="font-size:12px;">Discount</label>
                    <input type="number" name="discount" value="{{ old('discount',0) }}" min="0" step="0.01"
                           id="discount-input" class="form-input" style="font-size:13px;">
                </div>

                <div style="border-top:2px solid #f0f1f3;padding-top:12px;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:14px;font-weight:700;color:#111827;">Total Due</span>
                    <span style="font-size:18px;font-weight:700;color:#61078B;" id="preview-total">0.00</span>
                </div>
            </div>

            <div style="margin-top:20px;display:flex;flex-direction:column;gap:8px;">
                <button type="submit" class="btn btn-primary" style="justify-content:center;">Create Invoice</button>
                <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary" style="justify-content:center;">Cancel</a>
            </div>
        </div>
    </div>

</div>
</form>

@push('scripts')
<script>
let itemIndex = {{ old('items') ? count(old('items')) : 1 }};

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
    const total    = Math.max(0, subtotal + tax - discount);
    document.getElementById('preview-subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('preview-tax').textContent      = tax.toFixed(2);
    document.getElementById('preview-total').textContent    = total.toFixed(2);
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
recalculate();
</script>
@endpush

@endsection
