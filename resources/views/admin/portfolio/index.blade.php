@extends('admin.layout')
@section('title', 'Portfolio')
@section('page_title', 'Portfolio')

@section('content')

<div class="page-header">
    <div>
        <h2>Portfolio</h2>
        <p>{{ $items->total() }} total items</p>
    </div>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">+ Add Work</a>
</div>

<form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:18px;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title…"
           class="form-input" style="flex:1;min-width:200px;max-width:340px;">
    <button type="submit" class="btn btn-secondary">Filter</button>
    @if(request('search'))
    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Clear</a>
    @endif
</form>

<div class="admin-card">
    <div style="overflow-x:auto;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Work</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Published</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:12px;">
                            <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}"
                                 style="width:48px;height:48px;border-radius:8px;object-fit:cover;flex-shrink:0;">
                            <span style="font-weight:600;color:#111827;font-size:13.5px;">{{ $item->title }}</span>
                        </div>
                    </td>
                    <td style="color:#6b7280;">{{ $item->category ?? '—' }}</td>
                    <td>
                        @if($item->is_featured)
                        <span class="badge badge-active">Featured</span>
                        @else
                        <span style="color:#9ca3af;">—</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $item->is_published ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="text-right">
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px;">
                            <a href="{{ route('admin.portfolio.edit', $item) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" style="display:inline"
                                  onsubmit="return confirm('Delete {{ addslashes($item->title) }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:48px;">
                        <p style="font-size:14px;color:#9ca3af;margin:0 0 8px;">No portfolio items yet.</p>
                        <a href="{{ route('admin.portfolio.create') }}" style="color:#61078B;font-size:13.5px;">Add your first work →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
    <div style="padding:14px 20px;border-top:1px solid #f0f1f3;">{{ $items->links() }}</div>
    @endif
</div>

@endsection
