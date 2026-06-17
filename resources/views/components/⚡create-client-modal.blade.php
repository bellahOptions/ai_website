<?php

use App\Models\Client;
use Livewire\Component;

new class extends Component
{
    public bool   $open    = false;
    public string $name    = '';
    public string $email   = '';
    public string $phone   = '';
    public string $company = '';

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

        $this->dispatch('clientCreated', id: $client->id, name: $client->name, company: $client->company ?? '');
        $this->closeModal();
    }
};
?>

@if($open)
<div style="position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;padding:20px;">
    {{-- Backdrop --}}
    <div wire:click="closeModal"
         style="position:absolute;inset:0;background:rgba(0,0,0,.45);backdrop-filter:blur(2px);"></div>

    {{-- Modal card --}}
    <div style="position:relative;width:100%;max-width:460px;background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.18);overflow:hidden;">

        {{-- Header --}}
        <div style="background:#61078B;padding:20px 24px;display:flex;align-items:center;justify-content:space-between;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <span style="font-size:15px;font-weight:700;color:#fff;">New Client</span>
            </div>
            <button wire:click="closeModal" type="button"
                    style="background:rgba(255,255,255,.15);border:none;border-radius:7px;width:30px;height:30px;cursor:pointer;display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;line-height:1;padding:0;">×</button>
        </div>

        {{-- Body --}}
        <div style="padding:24px;">
            <div style="display:flex;flex-direction:column;gap:14px;">
                <div>
                    <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
                        Full Name <span style="color:#ef4444;">*</span>
                    </label>
                    <input wire:model="name" type="text" placeholder="Jane Doe"
                           style="width:100%;padding:9px 12px;border:1.5px solid {{ $errors->has('name') ? '#fca5a5' : '#d1d5db' }};border-radius:8px;font-size:13.5px;color:#111827;font-family:inherit;outline:none;box-sizing:border-box;background:{{ $errors->has('name') ? '#fef2f2' : '#fff' }};">
                    @error('name')<p style="font-size:12px;color:#b91c1c;margin:4px 0 0;">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">
                        Email Address <span style="color:#ef4444;">*</span>
                    </label>
                    <input wire:model="email" type="email" placeholder="jane@company.com"
                           style="width:100%;padding:9px 12px;border:1.5px solid {{ $errors->has('email') ? '#fca5a5' : '#d1d5db' }};border-radius:8px;font-size:13.5px;color:#111827;font-family:inherit;outline:none;box-sizing:border-box;background:{{ $errors->has('email') ? '#fef2f2' : '#fff' }};">
                    @error('email')<p style="font-size:12px;color:#b91c1c;margin:4px 0 0;">{{ $message }}</p>@enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                    <div>
                        <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">Phone</label>
                        <input wire:model="phone" type="text" placeholder="+234 800 000 0000"
                               style="width:100%;padding:9px 12px;border:1.5px solid #d1d5db;border-radius:8px;font-size:13.5px;color:#111827;font-family:inherit;outline:none;box-sizing:border-box;">
                    </div>
                    <div>
                        <label style="display:block;font-size:13px;font-weight:500;color:#374151;margin-bottom:6px;">Company</label>
                        <input wire:model="company" type="text" placeholder="Acme Ltd"
                               style="width:100%;padding:9px 12px;border:1.5px solid #d1d5db;border-radius:8px;font-size:13.5px;color:#111827;font-family:inherit;outline:none;box-sizing:border-box;">
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display:flex;gap:8px;margin-top:22px;">
                <button wire:click="save" type="button"
                        style="flex:1;padding:10px;background:#61078B;color:#fff;border:none;border-radius:8px;font-size:14px;font-weight:600;font-family:inherit;cursor:pointer;transition:background 150ms;box-shadow:0 2px 8px rgba(97,7,139,.3);">
                    <span wire:loading.remove wire:target="save">Create Client</span>
                    <span wire:loading wire:target="save">Creating…</span>
                </button>
                <button wire:click="closeModal" type="button"
                        style="padding:10px 18px;background:#f3f4f6;color:#374151;border:none;border-radius:8px;font-size:14px;font-weight:600;font-family:inherit;cursor:pointer;">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@else
<span></span>
@endif
