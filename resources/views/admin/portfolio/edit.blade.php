@extends('admin.layout')
@section('title', 'Edit Portfolio Item')
@section('page_title', 'Edit Portfolio Item')

@section('content')

<div style="max-width:680px;">
    <div style="margin-top:4px;">
        <a href="{{ route('admin.portfolio.index') }}" class="back-link">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
            Back to Portfolio
        </a>
        <div class="page-header" style="margin-top:6px;">
            <div><h2>Edit Portfolio Item</h2></div>
        </div>
    </div>

    <div class="admin-card" style="padding:28px;">
        <div style="margin-bottom:20px;">
            <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" style="max-width:240px;border-radius:8px;display:block;">
        </div>

        <form action="{{ route('admin.portfolio.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group" style="margin-bottom:18px;">
                <label class="form-label">Title <span class="req">*</span></label>
                <input type="text" name="title" value="{{ old('title', $item->title) }}" required class="form-input">
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label class="form-label">Replace Image</label>
                <input type="file" name="image" accept="image/*" class="form-input">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:18px;">
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" value="{{ old('category', $item->category) }}" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="form-input">
                </div>
            </div>

            <div class="form-group" style="margin-bottom:18px;">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-input">{{ old('description', $item->description) }}</textarea>
            </div>

            <div style="display:flex;gap:18px;margin-bottom:26px;">
                <label style="display:flex;align-items:center;gap:7px;cursor:pointer;font-size:13.5px;color:#374151;">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $item->is_featured) ? 'checked' : '' }} style="accent-color:#61078B;width:16px;height:16px;cursor:pointer;">
                    Feature on homepage
                </label>
                <label style="display:flex;align-items:center;gap:7px;cursor:pointer;font-size:13.5px;color:#374151;">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $item->is_published) ? 'checked' : '' }} style="accent-color:#61078B;width:16px;height:16px;cursor:pointer;">
                    Published
                </label>
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
