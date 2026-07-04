<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = PortfolioItem::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $items = $query->orderBy('sort_order')->orderByDesc('created_at')->paginate(15)->withQueryString();

        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['image'] = $request->file('image')->store('portfolio', 'public');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        PortfolioItem::create($data);

        return redirect()->route('admin.portfolio.index')
                         ->with('success', 'Portfolio item created successfully.');
    }

    public function edit(PortfolioItem $portfolioItem)
    {
        return view('admin.portfolio.edit', ['item' => $portfolioItem]);
    }

    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($portfolioItem->image);
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $portfolioItem->update($data);

        return redirect()->route('admin.portfolio.index')
                         ->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(PortfolioItem $portfolioItem)
    {
        Storage::disk('public')->delete($portfolioItem->image);
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio.index')
                         ->with('success', 'Portfolio item deleted.');
    }
}
