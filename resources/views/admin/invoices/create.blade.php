@extends('admin.layout')
@section('title', 'New Invoice')
@section('page_title', 'New Invoice')

@section('content')

<div class="mt-2 mb-6">
    <a href="{{ route('admin.invoices.index') }}" class="text-sm flex items-center gap-1.5 text-gray-500 hover:text-gray-700 transition">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Invoices
    </a>
    <h2 class="text-xl font-bold text-gray-900 mt-3">Create New Invoice</h2>
</div>

<form action="{{ route('admin.invoices.store') }}" method="POST" id="invoice-form">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left: main fields --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Header info --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Invoice Details</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Client <span class="text-red-500">*</span></label>
                        <select name="client_id" required
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            <option value="">Select a client</option>
                            @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ (old('client_id', request('client_id')) == $client->id) ? 'selected' : '' }}>
                                {{ $client->name }}@if($client->company) ({{ $client->company }})@endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Currency</label>
                        <select name="currency"
                                class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            <option value="NGN" {{ old('currency', 'NGN') === 'NGN' ? 'selected' : '' }}>NGN — Nigerian Naira</option>
                            <option value="USD" {{ old('currency') === 'USD' ? 'selected' : '' }}>USD — US Dollar</option>
                            <option value="GBP" {{ old('currency') === 'GBP' ? 'selected' : '' }}>GBP — British Pound</option>
                            <option value="EUR" {{ old('currency') === 'EUR' ? 'selected' : '' }}>EUR — Euro</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Issue Date <span class="text-red-500">*</span></label>
                        <input type="date" name="issue_date" value="{{ old('issue_date', date('Y-m-d')) }}" required
                               class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Due Date <span class="text-red-500">*</span></label>
                        <input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+30 days'))) }}" required
                               class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>
                </div>
            </div>

            {{-- Line items --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-semibold text-gray-700">Line Items</h3>
                </div>

                <div class="space-y-3" id="items-container">
                    {{-- Items will be appended here --}}
                    @if(old('items'))
                        @foreach(old('items') as $i => $item)
                        <div class="item-row grid grid-cols-12 gap-2 items-start">
                            <div class="col-span-5">
                                @if($i === 0)<label class="block text-xs text-gray-400 mb-1">Description</label>@endif
                                <input type="text" name="items[{{ $i }}][description]" value="{{ $item['description'] ?? '' }}" required placeholder="Service description"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                            </div>
                            <div class="col-span-2">
                                @if($i === 0)<label class="block text-xs text-gray-400 mb-1">Qty</label>@endif
                                <input type="number" name="items[{{ $i }}][quantity]" value="{{ $item['quantity'] ?? 1 }}" min="1" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-qty">
                            </div>
                            <div class="col-span-3">
                                @if($i === 0)<label class="block text-xs text-gray-400 mb-1">Unit Price</label>@endif
                                <input type="number" name="items[{{ $i }}][unit_price]" value="{{ $item['unit_price'] ?? '' }}" min="0" step="0.01" required placeholder="0.00"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-price">
                            </div>
                            <div class="col-span-2 text-right">
                                @if($i === 0)<label class="block text-xs text-gray-400 mb-1">Total</label>@endif
                                <div class="py-2 text-sm font-medium text-gray-700 item-total">
                                    {{ number_format(($item['quantity'] ?? 1) * ($item['unit_price'] ?? 0), 2) }}
                                </div>
                            </div>
                            @if($i > 0)
                            <div class="col-span-1 flex justify-end pt-1">
                                <button type="button" class="remove-item text-red-400 hover:text-red-600 transition p-1">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                </button>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    @else
                    <div class="item-row grid grid-cols-12 gap-2 items-start">
                        <div class="col-span-5">
                            <label class="block text-xs text-gray-400 mb-1">Description</label>
                            <input type="text" name="items[0][description]" required placeholder="Service description"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-xs text-gray-400 mb-1">Qty</label>
                            <input type="number" name="items[0][quantity]" value="1" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-qty">
                        </div>
                        <div class="col-span-3">
                            <label class="block text-xs text-gray-400 mb-1">Unit Price</label>
                            <input type="number" name="items[0][unit_price]" min="0" step="0.01" required placeholder="0.00"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 item-price">
                        </div>
                        <div class="col-span-2 text-right">
                            <label class="block text-xs text-gray-400 mb-1">Total</label>
                            <div class="py-2 text-sm font-medium text-gray-700 item-total">0.00</div>
                        </div>
                    </div>
                    @endif
                </div>

                <button type="button" id="add-item"
                        class="mt-4 flex items-center gap-1.5 text-sm font-medium transition"
                        style="color:#61078B;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Add Item
                </button>
            </div>

            {{-- Notes & Terms --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Notes</label>
                        <textarea name="notes" rows="3" placeholder="Thank you for your business…"
                                  class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none">{{ old('notes') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Terms</label>
                        <textarea name="terms" rows="3" placeholder="Payment is due within 30 days…"
                                  class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400 resize-none">{{ old('terms') }}</textarea>
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
                        <span class="font-medium text-gray-900" id="preview-subtotal">0.00</span>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Tax Rate (%)</label>
                        <input type="number" name="tax_rate" value="{{ old('tax_rate', 0) }}" min="0" max="100" step="0.01"
                               id="tax-rate-input"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>

                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Tax Amount</span>
                        <span class="text-gray-900" id="preview-tax">0.00</span>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Discount</label>
                        <input type="number" name="discount" value="{{ old('discount', 0) }}" min="0" step="0.01"
                               id="discount-input"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-400">
                    </div>

                    <div class="border-t border-gray-100 pt-3 flex justify-between">
                        <span class="text-sm font-semibold text-gray-900">Total</span>
                        <span class="text-base font-bold" style="color:#61078B;" id="preview-total">0.00</span>
                    </div>
                </div>

                <div class="mt-5 space-y-2">
                    <button type="submit"
                            class="w-full py-2.5 rounded-lg text-sm font-semibold text-white transition shadow-sm"
                            style="background:#61078B;"
                            onmouseover="this.style.background='#7c22a8'"
                            onmouseout="this.style.background='#61078B'">
                        Create Invoice
                    </button>
                    <a href="{{ route('admin.invoices.index') }}"
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
let itemIndex = {{ old('items') ? count(old('items')) : 1 }};

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

// Bind existing rows
document.querySelectorAll('.item-row').forEach(bindRowEvents);
document.getElementById('tax-rate-input').addEventListener('input', recalculate);
document.getElementById('discount-input').addEventListener('input', recalculate);
recalculate();
</script>
@endpush

@endsection
