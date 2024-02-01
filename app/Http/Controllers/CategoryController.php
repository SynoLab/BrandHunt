<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for images
            'category_description' => 'required',
        ]);
            // Store the category image
            $category_image = $request->file('category_image')->store('category_images', 'public');

            // Create the category using the validated data and the stored image path
            Category::create([
                'category_name' => $validated['category_name'],
                'category_image' => $category_image,
                'category_description' => $validated['category_description'],
            ]);
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.create', compact('category'));
    }

    public function update(Request $request, Category $category)
    
    {
        $validated = $request->validate([
            'category_name' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as per your validation requirements
            'category_description' => 'required',
        ]);

        $data = $request->only(['category_name', 'category_description']);

        if ($request->hasFile('category_image')) {
            $category_image = $request->file('category_image')->store('category_images');
            Storage::delete($category->category_image); // Delete old image

            $data['category_image'] = $category_image;
        }

        $category->update($data);

        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Storage::delete('slider_images/'.$category->image);
        $category->delete();

        return redirect()->route('categories.index')->with('success','Category deleted successfully.');
    }
}
