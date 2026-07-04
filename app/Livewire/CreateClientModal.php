<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateClientModal extends Component
{
    public bool   $open    = false;
    public string $name    = '';
    public string $email   = '';
    public string $phone   = '';
    public string $company = '';

    #[On('open-create-client')]
    public function openModal(): void
    {
        $this->open = true;
    }

    public function closeModal(): void
    {
        $this->open    = false;
        $this->name    = '';
        $this->email   = '';
        $this->phone   = '';
        $this->company = '';
        $this->resetErrorBag();
    }

    public function save(): void
    {
        abort_unless(auth()->user()?->isSuperAdmin(), 403);

        $data = $this->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255', 'unique:clients,email'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
        ]);

        $client = Client::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'] ?? null,
            'company' => $data['company'] ?? null,
            'status'  => 'active',
        ]);

        $this->dispatch('clientCreated',
            id:      $client->id,
            name:    $client->name,
            company: $client->company ?? '',
        );

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.create-client-modal');
    }
}
