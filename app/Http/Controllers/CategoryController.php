<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;   // for store(), update(), destroy()
use Illuminate\Http\Request;
use Illuminate\View\View;               // for index(), create(), edit()

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('category.index', [
            'categories' => Category::withCount('products')->orderBy('CategoryID')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateCategory($request);

        $category = Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', "Category '{$category->CategoryName}' created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        $products = $category->products()->orderBy('ProductID')->get();

        return view('category.show', [
            'category' => $category,
            'products' => $products,
            'avgPrice' => $products->avg('Price'),
            'maxPrice' => $products->max('Price'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category):RedirectResponse
    {
        $validated = $this->validateCategory($request);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', "Category '{$validated['CategoryName']}' updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $productCount = $category->products()->count();

        if ($productCount > 0) {
            return back()->withErrors([
                'category' => "Cannot delete '{$category->CategoryName}': {$productCount} "
                    . ($productCount === 1 ? 'product still references it.' : 'products still reference it.')
                    . ' Reassign or delete its products first.',
            ]);
        }

        $name = $category->CategoryName;
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', "Category '{$name}' deleted.");
    }
    /**
     * Validation rules shared by store() and update(). Limits match the
     * categories columns: CategoryName varchar(25), Description varchar(255).
    */
    private function validateCategory(Request $request): array
    {
        return $request->validate([
            'CategoryName' => ['required', 'string', 'max:25'],
            'Description' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
