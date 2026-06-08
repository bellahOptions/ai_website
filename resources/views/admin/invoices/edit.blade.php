@extends('admin.layout')
@section('title', 'Edit ' . $invoice->invoice_number)
@section('page_title', 'Edit Invoice')

@section('content')

<div class="mt-2 mb-6">
    <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-sm flex items-center gap-1.5 text-gray-500 hover:text-gray-700 transition">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to {{ $invoice->invoice_number }}
    </a>
    <div class="flex items-center gap-3 mt-3">
        <h2 class="text-xl font-bold text-gray-900">Edit Invoice</h2>
        <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
    </div>
</div>

<form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" id="invoice-form">
    @csrf @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left: main fields --}}
        <div class="lg:col-span-2 space-y-5">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Invoice Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Client <span class="text-red-500">*</span></label>
                        <select name="client_id" required
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id', $invoice->client_id) == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}@if($client->company) ({{ $client->company }})@endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                        <select name="status"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            @foreach(['draft','sent','paid','overdue','cancelled'] as $s)
                            <option value="{{ $s }}" {{ old('status', $invoice->status) === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Currency</label>
                        <select name="currency"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            <option value="NGN" {{ old('currency', $invoice->currency) === 'NGN' ? 'selected' : '' }}>NGN — Nigerian Naira</option>
                            <option value="USD" {{ old('currency', $invoice->currency) === 'USD' ? 'selected' : '' }}>USD — US Dollar</option>
                            <option value="GBP" {{ old('currency', $invoice->currency) === 'GBP' ? 'selected' : '' }}>GBP — British Pound</option>
                            <option value="EUR" {{ old('currency', $invoice->currency) === 'EUR' ? 'selected' : '' }}>EUR — Euro</option>
                        </select>
                    </div>
                    <div></div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Issue Date <span class="text-red-500">*</span></label>
                        <input type="date" name="issue_date" value="{{ old('issue_date', $invoice->issue_date->format('Y-m-d')) }}" required
                               class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Due Date <span class="text-red-500">*</span></label>
                        <input type="date" name="due_date" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}" required
                               class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>
                </div>
            </div>

            {{-- Line items --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Line Items</h3>

                <div class="space-y-3" id="items-container">
                    @php $existingItems = old('items') ? collect(old('items'))->values() : $invoice->items; @endphp
                    @foreach($existingItems as $i => $item)
                    @php
                        $desc = is_array($item) ? ($item['description'] ?? '') : $item->description;
                        $qty  = is_array($item) ? ($item['quantity'] ?? 1)  : $item->quantity;
                        $price = is_array($item) ? ($item['unit_price'] ?? 0) : $item->unit_price;
                    @endphp
                    <div class="item-row grid grid-cols-12 gap-2 items-start">
                        <div class="col-span-5">
                            @if($loop->first)<label class="block text-xs text-gray-400 mb-1">Description</label>@endif
                            <input type="text" name="items[{{ $i }}][description]" value="{{ $desc }}" required placeholder="Service description"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                        </div>
                        <div class="col-span-2">
                            @if($loop->first)<label class="block text-xs text-gray-400 mb-1">Qty</label>@endif
                            <input type="number" name="items[{{ $i }}][quantity]" value="{{ $qty }}" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-qty">
                        </div>
                        <div class="col-span-3">
                            @if($loop->first)<label class="block text-xs text-gray-400 mb-1">Unit Price</label>@endif
                            <input type="number" name="items[{{ $i }}][unit_price]" value="{{ $price }}" min="0" step="0.01" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-price">
                        </div>
                        <div class="col-span-{{ $loop->first ? '2' : '1' }} text-right">
                            @if($loop->first)<label class="block text-xs text-gray-400 mb-1">Total</label>@endif
                            <div class="py-2 text-sm font-medium text-gray-700 item-total">{{ number_format($qty * $price, 2) }}</div>
                        </div>
                        @if(!$loop->first)
                        <div class="col-span-1 flex justify-end pt-1">
                            <button type="button" class="remove-item text-red-400 hover:text-red-600 transition p-1">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            </button>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <button type="button" id="add-item"
                        class="mt-4 flex items-center gap-1.5 text-sm font-medium transition"
                        style="color:#61078B;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Add Item
                </button>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Notes</label>
                        <textarea name="notes" rows="3"
                                  class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none">{{ old('notes', $invoice->notes) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Terms</label>
                        <textarea name="terms" rows="3"
                                  class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none">{{ old('terms', $invoice->terms) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: totals + submit --}}
        <div class="space-y-5">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5 sticky top-20">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Summary</h3>

                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-medium text-gray-900" id="preview-subtotal">{{ number_format($invoice->subtotal, 2) }}</span>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Tax Rate (%)</label>
                        <input type="number" name="tax_rate" value="{{ old('tax_rate', $invoice->tax_rate) }}" min="0" max="100" step="0.01"
                               id="tax-rate-input"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Tax Amount</span>
                        <span class="text-gray-900" id="preview-tax">{{ number_format($invoice->tax_amount, 2) }}</span>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Discount</label>
                        <input type="number" name="discount" value="{{ old('discount', $invoice->discount) }}" min="0" step="0.01"
                               id="discount-input"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>

                    <div class="border-t border-gray-100 pt-3 flex justify-between">
                        <span class="text-sm font-semibold text-gray-900">Total</span>
                        <span class="text-base font-bold" style="color:#61078B;" id="preview-total">{{ number_format($invoice->total, 2) }}</span>
                    </div>
                </div>

                <div class="mt-5 space-y-2">
                    <button type="submit"
                            class="w-full py-2.5 rounded-lg text-sm font-semibold text-white transition shadow-sm"
                            style="background:#61078B;"
                            onmouseover="this.style.background='#7c22a8'"
                            onmouseout="this.style.background='#61078B'">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.invoices.show', $invoice) }}"
                       class="w-full block text-center py-2.5 rounded-lg text-sm font-medium border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
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
        const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
        const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
        const total = qty * price;
        const totalEl = row.querySelector('.item-total');
        if (totalEl) totalEl.textContent = total.toFixed(2);
        subtotal += total;
    });

    const taxRate = parseFloat(document.getElementById('tax-rate-input')?.value) || 0;
    const discount = parseFloat(document.getElementById('discount-input')?.value) || 0;
    const tax = subtotal * (taxRate / 100);
    const total = subtotal + tax - discount;

    document.getElementById('preview-subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('preview-tax').textContent = tax.toFixed(2);
    document.getElementById('preview-total').textContent = Math.max(0, total).toFixed(2);
}

document.getElementById('add-item').addEventListener('click', function () {
    const container = document.getElementById('items-container');
    const div = document.createElement('div');
    div.className = 'item-row grid grid-cols-12 gap-2 items-start';
    div.innerHTML = `
        <div class="col-span-5">
            <input type="text" name="items[${itemIndex}][description]" required placeholder="Service description"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
        </div>
        <div class="col-span-2">
            <input type="number" name="items[${itemIndex}][quantity]" value="1" min="1" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-qty">
        </div>
        <div class="col-span-3">
            <input type="number" name="items[${itemIndex}][unit_price]" min="0" step="0.01" required placeholder="0.00"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-price">
        </div>
        <div class="col-span-1 text-right">
            <div class="py-2 text-sm font-medium text-gray-700 item-total">0.00</div>
        </div>
        <div class="col-span-1 flex justify-end pt-1">
            <button type="button" class="remove-item text-red-400 hover:text-red-600 transition p-1">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
    `;
    container.appendChild(div);
    itemIndex++;
    bindRowEvents(div);
    recalculate();
});

function bindRowEvents(row) {
    row.querySelectorAll('.item-qty, .item-price').forEach(input => {
        input.addEventListener('input', recalculate);
    });
    const removeBtn = row.querySelector('.remove-item');
    if (removeBtn) {
        removeBtn.addEventListener('click', () => { row.remove(); recalculate(); });
    }
}

document.querySelectorAll('.item-row').forEach(bindRowEvents);
document.getElementById('tax-rate-input').addEventListener('input', recalculate);
document.getElementById('discount-input').addEventListener('input', recalculate);
</script>
@endpush

@endsection
