<x-mail::message>
# Payment Received — Thank You!

Dear **{{ $invoice->client->name }}**,

We have received your payment for **Invoice {{ $invoice->invoice_number }}**. Your account is now up to date.

<x-mail::panel>
**Invoice:** {{ $invoice->invoice_number }}
**Amount Paid:** {{ $invoice->currency }} {{ number_format($invoice->total, 2) }}
**Date Paid:** {{ $invoice->paid_at->format('F j, Y') }}
**Status:** ✅ PAID
</x-mail::panel>

Thank you for your prompt payment. We truly value your business and look forward to continuing to serve your brand.

If you have any questions about this receipt, please don't hesitate to reach out.

Thanks,<br>
**AI Digital Agency**<br>
aidigitalagency08@gmail.com | +234 707 777 6734
</x-mail::message>
