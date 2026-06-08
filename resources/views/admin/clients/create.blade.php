@extends('admin.layout')
@section('title', 'Add Client')
@section('page_title', 'Add Client')

@section('content')

<div style="max-width:680px;">
    <div style="margin-top:4px;">
        <a href="{{ route('admin.clients.index') }}" class="back-link">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Back to Clients
        </a>
        <div class="page-header" style="margin-top:6px;">
            <div><h2>Add New Client</h2></div>
        </div>
    </div>

    <div class="admin-card" style="padding:28px;">
        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;">
                <div class="form-group">
                    <label class="form-label">Full Name <span class="req">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="form-input" placeholder="e.g. John Doe">
                </div>
                <div class="form-group">
                    <label class="form-label">Email <span class="req">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="form-input" placeholder="client@example.com">
                </div>
                <div class="form-group">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="+234 700 000 0000">
                </div>
                <div class="form-group">
                    <label class="form-label">Company</label>
                    <input type="text" name="company" value="{{ old('company') }}" class="form-input" placeholder="Company name (optional)">
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="form-input" placeholder="Lagos">
                </div>
                <div class="form-group">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" value="{{ old('country', 'Nigeria') }}" class="form-input">
                </div>
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label class="form-label">Address</label>
                <textarea name="address" rows="2" class="form-input" placeholder="Street address (optional)">{{ old('address') }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label class="form-label">Status</label>
                <select name="status" class="form-input" style="max-width:200px;">
                    <option value="active"   {{ old('status', 'active') === 'active'   ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom:26px;">
                <label class="form-label">Notes</label>
                <textarea name="notes" rows="3" class="form-input" placeholder="Internal notes about this client…">{{ old('notes') }}</textarea>
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn btn-primary">Create Client</button>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
