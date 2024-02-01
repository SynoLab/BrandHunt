<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function getBlogs()
    {
        $blogs = Blog::all();

    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_name' => 'required|string',
            'author' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $validatedData = [
            'blog_name' => $request->get('blog_name'),
            'author' => $request->get('author'),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
        ];
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $blog = Blog::create($validatedData);
    
        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $galleryImage->store('blog_gallery_images', 'public');
    
                // Create a new entry in the blogs_gallery_images table
                $blog->galleryImages()->create([
                    'image_url' => $galleryImagePath
                ]);
            }
        }
    
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }
    
    

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('admin.blogs.create', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blog_name' => 'required|string',
            'author' => 'required|string',
            'date' => 'required|date',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $blog = Blog::findOrFail($id);
    
        $validatedData = [
            'blog_name' => $request->get('blog_name'),
            'author' => $request->get('author'),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
        ];
    
        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
    
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Handle gallery images update
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images
            $blog->galleryImages()->delete();
    
            // Store new gallery images
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImagePath = $galleryImage->store('blog_gallery_images', 'public');
    
                // Create a new entry in the blogs_gallery_images table
                $blog->galleryImages()->create([
                    'image_url' => $galleryImagePath
                ]);
            }
        }
    
        $blog->update($validatedData);
    
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }
    
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
    public function show($id)
{
    // Retrieve the blog entry by ID and return it, e.g., for JSON response
    $blog = Blog::find($id);

    return response()->json($blog);
}

}