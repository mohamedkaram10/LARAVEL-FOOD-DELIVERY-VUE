<?php

namespace App\Http\Controllers\Vendor;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreProductRequest;
use App\Http\Requests\Vendor\UpdateProductRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Vendor/Products/Create', [
            'categories' => Category::all(['id', 'name']),
            'category_id' => request('category_id'),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return to_route('vendor.menu')
            ->withStatus('Product created successfully.');
    }

    public function edit(Product $product)
    {
        return Inertia::render('Vendor/Products/Edit', [
            'categories' => Category::get(['id', 'name']),
            'product'    => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return to_route('vendor.menu')
            ->withStatus('Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('vendor.menu')
            ->withStatus('Product deleted successfully.');
    }
}
