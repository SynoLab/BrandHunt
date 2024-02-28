<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([

            'author' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string',
            'body' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);
    
        $review = Review::create([
            'author' => $validatedData['author'],
            'email' => $validatedData['email'],
            'rating' => $validatedData['rating'],
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'product_id' => $validatedData['product_id'],
        ]);
    
        return redirect()->back();
    }
    
    
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get(); 

        return view('site.shop.product',['product' => $product, 'reviews' => $reviews] );
    }
    
   
    }
