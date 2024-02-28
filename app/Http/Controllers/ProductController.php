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

            'product_description' => 'nullable|string',
            'price' => 'required|integer',
            'short_description'=> 'nullable|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'product_condition' => 'nullable|in:new,used,used like new',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'product_type' => 'required|in:0,1',

        ]);
    
        $productData = $request->only([
            'name', 'quantity', 'product_description', 'price', 'short_description', 'sku', 'category_id',
            'color', 'manufacturer', 'product_condition', 'height', 'weight','product_type'
        ]);
    
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_description' => 'nullable|string',
            'price' => 'required|integer',
            'short_description' => 'nullable|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'product_type' => 'required|in:0,1',
            'condition' => 'nullable|string',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
        ]);
    
        $productData = $request->only([
            'name', 'quantity', 'product_description', 'price', 'short_description', 'sku', 'category_id',
            'color', 'manufacturer', 'product_type', 'condition', 'height', 'weight'
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $productData['image'] = $imagePath;
        }
    
        $product->update($productData);
    
        // Update gallery images
        if ($request->hasFile('gallery_images')) {
            $product->galleryImages()->delete(); // Delete existing gallery images
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
