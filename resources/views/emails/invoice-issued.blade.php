<x-mail::message>
# Invoice {{ $invoice->invoice_number }}

Dear **{{ $invoice->client->name }}**,

Please find your invoice details below. Payment is due by **{{ $invoice->due_date->format('F j, Y') }}**.

<x-mail::table>
| Description | Qty | Unit Price | Total |
|:---|:---:|---:|---:|
@foreach($invoice->items as $item)
| {{ $item->description }} | {{ $item->quantity }} | {{ $invoice->currency }} {{ number_format($item->unit_price, 2) }} | {{ $invoice->currency }} {{ number_format($item->total, 2) }} |
@endforeach
</x-mail::table>

---

**Subtotal:** {{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}
@if($invoice->tax_rate > 0)
**Tax ({{ $invoice->tax_rate }}%):** {{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}
@endif
@if($invoice->discount > 0)
**Discount:** -{{ $invoice->currency }} {{ number_format($invoice->discount, 2) }}
@endif
**Total Due:** {{ $invoice->currency }} **{{ number_format($invoice->total, 2) }}**

---

@if($invoice->notes)
**Notes:** {{ $invoice->notes }}
@endif

@if($invoice->terms)
**Payment Terms:** {{ $invoice->terms }}
@endif

To arrange payment or for any queries, please reply to this email or call us at **+234 707 777 6734**.

Thanks,<br>
**AI Digital Agency**<br>
aidigitalagency08@gmail.com
</x-mail::message>
