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
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:7px;">
                        <label class="form-label" style="margin-bottom:0;">Client <span class="req">*</span></label>
                        @if(auth()->user()->isSuperAdmin())
                        <button type="button" onclick="Livewire.dispatch('open-create-client')"
                                style="background:none;border:none;cursor:pointer;font-size:12.5px;color:#61078B;font-weight:600;font-family:inherit;display:flex;align-items:center;gap:4px;padding:0;">
                            <span style="font-size:16px;line-height:1;">+</span> New Client
                        </button>
                        @endif
                    </div>
                    <select name="client_id" id="client_id_select" required class="form-input">
                        <option value="">Select a client…</option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', request('client_id')) == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}@if($client->company) — {{ $client->company }}@endif
                        </option>
                        @endforeach
                    </select>
                </div>

                @if(auth()->user()->isSuperAdmin())
                <livewire:create-client-modal />
                @endif
                <div class="form-group">
                    <label class="form-label">Currency</label>
                    <select name="currency" id="currency-select" class="form-input">
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
            <p style="font-size:13px;font-weight:600;color:#374151;margin:0 0 16px;">Services</p>

            <div style="display:grid;grid-template-columns:1fr 130px 110px auto 90px 32px;gap:8px;align-items:center;margin-bottom:8px;padding-bottom:8px;border-bottom:1px solid #f0f1f3;">
                <span style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Description</span>
                <span style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Price (<span id="price-header-symbol">₦</span>)</span>
                <span style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Discount (<span id="discount-header-symbol">₦</span>)</span>
                <span style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;text-align:center;">VAT 7.5%</span>
                <span style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;text-align:right;">Total</span>
                <span></span>
            </div>

            <div id="items-container" style="display:flex;flex-direction:column;gap:10px;">
                @if(old('items'))
                    @foreach(old('items') as $i => $item)
                    <div class="item-row" style="display:grid;grid-template-columns:1fr 130px 110px auto 90px 32px;gap:8px;align-items:center;">
                        <input type="text"   name="items[{{ $i }}][description]" value="{{ $item['description'] ?? '' }}" required placeholder="Service description" class="form-input">
                        <input type="number" name="items[{{ $i }}][unit_price]"  value="{{ $item['unit_price'] ?? '' }}"  min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
                        <input type="number" name="items[{{ $i }}][discount]"    value="{{ $item['discount'] ?? '0' }}"   min="0" step="0.01" placeholder="0.00" class="form-input item-discount">
                        <label style="display:flex;align-items:center;justify-content:center;gap:5px;cursor:pointer;white-space:nowrap;font-size:13px;color:#374151;padding:0 4px;">
                            <input type="checkbox" name="items[{{ $i }}][apply_vat]" value="1" class="item-vat" {{ !empty($item['apply_vat']) ? 'checked' : '' }} style="accent-color:#61078B;width:15px;height:15px;cursor:pointer;">
                            Apply
                        </label>
                        <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#61078B;padding:9px 0;">0.00</div>
                        <button type="button" class="remove-item" style="width:28px;height:28px;border:none;background:#fff0f0;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#ef4444;font-size:15px;padding:0;">×</button>
                    </div>
                    @endforeach
                @else
                <div class="item-row" style="display:grid;grid-template-columns:1fr 130px 110px auto 90px 32px;gap:8px;align-items:center;">
                    <input type="text"   name="items[0][description]" required placeholder="Service description" class="form-input">
                    <input type="number" name="items[0][unit_price]"  min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
                    <input type="number" name="items[0][discount]"    value="0" min="0" step="0.01" placeholder="0.00" class="form-input item-discount">
                    <label style="display:flex;align-items:center;justify-content:center;gap:5px;cursor:pointer;white-space:nowrap;font-size:13px;color:#374151;padding:0 4px;">
                        <input type="checkbox" name="items[0][apply_vat]" value="1" class="item-vat" style="accent-color:#61078B;width:15px;height:15px;cursor:pointer;">
                        Apply
                    </label>
                    <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#61078B;padding:9px 0;">0.00</div>
                    <div style="width:28px;"></div>
                </div>
                @endif
            </div>

            <button type="button" id="add-item"
                    style="margin-top:16px;background:none;border:none;cursor:pointer;font-size:13.5px;color:#61078B;font-weight:600;padding:0;display:flex;align-items:center;gap:6px;font-family:inherit;">
                <span style="font-size:18px;line-height:1;">+</span> Add Service
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

                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:13.5px;color:#6b7280;">VAT (7.5%)</span>
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

const CURRENCY_SYMBOLS = @json(\App\Models\Invoice::currencySymbols());

function currentSymbol() {
    const code = document.getElementById('currency-select').value;
    return CURRENCY_SYMBOLS[code] || (code + ' ');
}

function rowTotal(price, discount, applyVat) {
    const net = Math.max(0, price - discount);
    return net * (applyVat ? 1.075 : 1);
}

function recalculate() {
    const symbol = currentSymbol();
    document.getElementById('price-header-symbol').textContent = symbol;
    document.getElementById('discount-header-symbol').textContent = symbol;

    let subtotal = 0, vatTotal = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const price    = parseFloat(row.querySelector('.item-price')?.value)    || 0;
        const discount = parseFloat(row.querySelector('.item-discount')?.value) || 0;
        const applyVat = row.querySelector('.item-vat')?.checked || false;
        const net      = Math.max(0, price - discount);
        const vat      = applyVat ? net * 0.075 : 0;
        const total    = net + vat;
        const el = row.querySelector('.item-total');
        if (el) el.textContent = symbol + total.toFixed(2);
        subtotal += net;
        vatTotal += vat;
    });
    const invDiscount = parseFloat(document.getElementById('discount-input').value) || 0;
    const grandTotal  = Math.max(0, subtotal + vatTotal - invDiscount);
    document.getElementById('preview-subtotal').textContent = symbol + subtotal.toFixed(2);
    document.getElementById('preview-tax').textContent      = symbol + vatTotal.toFixed(2);
    document.getElementById('preview-total').textContent    = symbol + grandTotal.toFixed(2);
}

function bindRow(row) {
    row.querySelectorAll('.item-price,.item-discount').forEach(i => i.addEventListener('input', recalculate));
    const vat = row.querySelector('.item-vat');
    if (vat) vat.addEventListener('change', recalculate);
    const rb = row.querySelector('.remove-item');
    if (rb) rb.addEventListener('click', () => { row.remove(); recalculate(); });
}

function makeRow(index) {
    const div = document.createElement('div');
    div.className = 'item-row';
    div.style.cssText = 'display:grid;grid-template-columns:1fr 130px 110px auto 90px 32px;gap:8px;align-items:center;';
    div.innerHTML = `
        <input type="text"   name="items[${index}][description]" required placeholder="Service description" class="form-input">
        <input type="number" name="items[${index}][unit_price]"  min="0" step="0.01" required placeholder="0.00" class="form-input item-price">
        <input type="number" name="items[${index}][discount]"    value="0" min="0" step="0.01" placeholder="0.00" class="form-input item-discount">
        <label style="display:flex;align-items:center;justify-content:center;gap:5px;cursor:pointer;white-space:nowrap;font-size:13px;color:#374151;padding:0 4px;">
            <input type="checkbox" name="items[${index}][apply_vat]" value="1" class="item-vat" style="accent-color:#61078B;width:15px;height:15px;cursor:pointer;">
            Apply
        </label>
        <div class="item-total" style="text-align:right;font-size:13.5px;font-weight:600;color:#61078B;padding:9px 0;">0.00</div>
        <button type="button" class="remove-item" style="width:28px;height:28px;border:none;background:#fff0f0;border-radius:6px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#ef4444;font-size:16px;padding:0;">×</button>
    `;
    bindRow(div);
    return div;
}

document.getElementById('add-item').addEventListener('click', () => {
    document.getElementById('items-container').appendChild(makeRow(itemIndex++));
    recalculate();
});

document.querySelectorAll('.item-row').forEach(bindRow);
document.getElementById('discount-input').addEventListener('input', recalculate);
document.getElementById('currency-select').addEventListener('change', recalculate);
recalculate();

document.addEventListener('livewire:initialized', function () {
    Livewire.on('clientCreated', function (params) {
        var id      = params.id;
        var name    = params.name;
        var company = params.company;
        var select  = document.getElementById('client_id_select');
        var label   = name + (company ? ' — ' + company : '');
        var option  = new Option(label, id, true, true);
        select.appendChild(option);
        select.value = id;
    });
});
</script>
@endpush

@endsection
