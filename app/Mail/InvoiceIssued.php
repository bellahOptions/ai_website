<?php

namespace App\Mail;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceIssued extends Mailable
{
    use Queueable, SerializesModels;

    public Invoice $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice ' . $this->invoice->invoice_number . ' from AI Digital Agency',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice-issued',
            with: ['invoice' => $this->invoice],
        );
    }

    public function attachments(): array
    {
        $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $this->invoice])
                  ->setPaper('a4', 'portrait');

        return [
            Attachment::fromData(
                fn() => $pdf->output(),
                $this->invoice->invoice_number . '.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
