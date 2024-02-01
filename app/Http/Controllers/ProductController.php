<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {

        return view('admin.products.create')->with('categories',Category::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'short_description'=> 'nullable|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
        ]);
    
        $productData = $request->only(['name', 'quantity', 'description', 'price', 'short_description', 'sku', 'category_id']);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $productData['image'] = $imagePath;
        }
    
        $product = Product::create($productData);
    
        // Store gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $galleryImage->store('product_gallery_images', 'public');
                $product->galleryImages()->create(['image_url' => $galleryImagePath]);
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'quantity' => 'required|integer',
        'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'nullable|string',
        'price' => 'required|integer',
        'short_description' => 'nullable|string',
        'sku' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    $productData = $request->only(['name', 'quantity', 'description', 'price', 'short_description', 'sku', 'category_id']);

    if ($request->hasFile('new_image')) {
        Storage::delete('public/' . $product->image);
        $imagePath = $request->file('new_image')->store('product_images', 'public');
        $productData['image'] = $imagePath;
    }

    // Update product details
    $product->update($productData);

    // Update or add new gallery images
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $galleryImage) {
            $galleryImagePath = $galleryImage->store('product_gallery_images', 'public');
            $product->galleryImages()->create(['image_url' => $galleryImagePath]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}
    
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
