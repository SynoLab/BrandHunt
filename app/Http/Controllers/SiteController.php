<?php

namespace App\Http\Controllers;
use App\Models\NewsletterEmail;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Review;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::all();
        $featuredProducts = Product::where('product_type', 1)->orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('sliders','products','featuredProducts'));
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
        $products = Product::all();
        $reviews = Review::where('product_id', $id)->get(); 

        return view('site.shop.product', compact('product','products','reviews'));
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

    public function ContactUs()
    {
        return view('site.contact.contact'); 
    }
    
    public function NewsletterSignup(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:newsletter_emails,email'
        ]);
    
        try {
            // Create a new NewsletterEmail instance
            $newsletterEmail = new NewsletterEmail();
            $newsletterEmail->email = $request->email;
            $newsletterEmail->save();
    
            // You can also return a success message or redirect the user to a thank you page
            return redirect()->back()->with('success', 'Your request has been successfully received. We will get back to you soon!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
