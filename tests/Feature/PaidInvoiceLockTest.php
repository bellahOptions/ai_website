<?php

use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function invoiceWithStatus(string $status): Invoice
{
    $client = Client::firstOrCreate(['email' => 'acme@example.com'], ['name' => 'Acme', 'status' => 'active']);

    return Invoice::create([
        'invoice_number' => 'INV-TEST-' . $status, 'client_id' => $client->id, 'status' => $status,
        'issue_date' => now(), 'due_date' => now()->addWeek(),
        'subtotal' => 100, 'tax_rate' => 0, 'tax_amount' => 0, 'discount' => 0, 'total' => 100, 'currency' => 'NGN',
    ]);
}

beforeEach(function () {
    $admin = User::factory()->create(['is_admin' => true, 'role' => 'super_admin', 'email_verified_at' => now()]);
    $this->actingAs($admin)->withSession(['2fa_verified' => true]);
});

it('blocks editing and updating a paid invoice', function () {
    $invoice = invoiceWithStatus('paid');

    $this->get(route('admin.invoices.edit', $invoice))
        ->assertRedirect(route('admin.invoices.show', $invoice))
        ->assertSessionHas('error');

    $this->put(route('admin.invoices.update', $invoice), ['status' => 'draft', 'notes' => 'changed'])
        ->assertRedirect(route('admin.invoices.show', $invoice));

    expect($invoice->fresh()->status)->toBe('paid');
});

it('still allows editing an unpaid invoice and hides Edit only for paid ones', function () {
    $draft = invoiceWithStatus('draft');
    $this->get(route('admin.invoices.edit', $draft))->assertOk();

    $paid = invoiceWithStatus('paid');
    $this->get(route('admin.invoices.index'))
        ->assertSee(route('admin.invoices.edit', $draft), false)
        ->assertDontSee(route('admin.invoices.edit', $paid), false);
});
