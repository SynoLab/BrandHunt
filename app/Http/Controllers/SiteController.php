<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('welcome', compact('sliders'));
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('site.shop.shop', compact('products','categories'));
    }

    public function ShowProduct($id)
    {
        // Fetch the product from the database based on the provided ID
        $product = Product::findOrFail($id);

        // Pass the product data to the view
        return view('site.shop.product', compact('product'));
    }

    public function Blogs()
    {
        // Fetch the product from the database based on the provided ID
        $blogs = Blog::all();

        // Pass the product data to the view
        return view('site.blogs.blogs', compact('blogs'));
    }


    public function ShowBlog($id)
    {
        // Fetch the product from the database based on the provided ID
        $blog = Blog::findOrFail($id);

        // Pass the product data to the view
        return view('site.blogs.blog_details', compact('blog'));
    }
    public function showContactForm()
    {
        // return view('contact'); // Assuming you have a blade file named contact.blade.php
    }


    public function sendContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
    
        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('nisaldilesh14@gmail.com', 'Nisal Perera')
                    ->subject('New Contact Form Submission');
        });
    
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    
}
