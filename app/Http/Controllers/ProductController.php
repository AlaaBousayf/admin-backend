<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');
        if ($request->has('q')) {
            $q = $request->input('q');
            $query->where(function ($subQuery) use ($q) {
                $subQuery->where('title', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
            });
        }

        if ($request->has('category') && $request->input('category') !== 'All') {
            $category = $request->input('category');
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        $total = $query->count();
        $limit = $request->input('limit', 10);
        $skip = $request->input('skip', 0);

        $products = $query->skip($skip)->take($limit)->get();

        return response()->json([
            'products' => ProductResource::collection($products),
            'total' => $total,
            'skip' => (int) $skip,
            'limit' => (int) $limit,
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $limit = $request->input('limit', 10);
        $skip = $request->input('skip', 0);

        $query = Product::where('title', 'like', "%{$q}%")
            ->orWhere('description', 'like', "%{$q}%");

        $total = $query->count();
        $products = $query->skip($skip)->take($limit)->get();

        return response()->json([
            'products' => ProductResource::collection($products),
            'total' => $total,
            'skip' => (int) $skip,
            'limit' => (int) $limit,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $category = Category::where('name', $validated['category'])->firstOrFail();

        $product = Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'discount_percentage' => $validated['discountPercentage'] ?? 0,
            'rating' => $validated['rating'] ?? 0,
            'stock' => $validated['stock'],
            'brand' => $validated['brand'] ?? 'Generic',
            'category_id' => $category->id,
            'thumbnail' => $validated['thumbnail'] ?? 'https://placehold.co/200',
            'images' => $validated['images'] ?? [],
        ]);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();

        $updateData = [];

        if (isset($validated['title'])) $updateData['title'] = $validated['title'];
        if (isset($validated['description'])) $updateData['description'] = $validated['description'];
        if (isset($validated['price'])) $updateData['price'] = $validated['price'];
        if (isset($validated['discountPercentage'])) $updateData['discount_percentage'] = $validated['discountPercentage'];
        if (isset($validated['rating'])) $updateData['rating'] = $validated['rating'];
        if (isset($validated['stock'])) $updateData['stock'] = $validated['stock'];
        if (isset($validated['brand'])) $updateData['brand'] = $validated['brand'];
        if (isset($validated['thumbnail'])) $updateData['thumbnail'] = $validated['thumbnail'];
        if (isset($validated['images'])) $updateData['images'] = $validated['images'];

        if (isset($validated['category'])) {
            $category = Category::where('name', $validated['category'])->firstOrFail();
            $updateData['category_id'] = $category->id;
        }

        $product->update($updateData);

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        \Illuminate\Support\Facades\Log::info("Product destroy request for ID: {$id}");

        $product = Product::findOrFail($id);
        $product->delete();

        $data = (new ProductResource($product))->resolve();
        $data['isDeleted'] = true;
        $data['deletedOn'] = now()->toIso8601String();

        return response()->json($data);
    }
}
