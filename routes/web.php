<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Auth\LoginController;

// Admin Routes
// Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Site Routes 
Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('site.welcome');

Route::get('/products', [SiteController::class, 'shop'])->name('shop');
Route::get('/products/{id}', [SiteController::class, 'ShowProduct'])->name('product.show');

Route::get('/blogs', [SiteController::class, 'Blogs'])->name('blogs');
Route::get('/blogs/{id}', [SiteController::class, 'ShowBlog'])->name('site_blogs.show');


// Email Subscription 
// Route::get('/contact', [SiteController::class, 'showContactForm'])->name('contact.show');
Route::post('/contact_us', [SiteController::class, 'sendContactForm'])->name('contact.send');







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin_products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin_products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin_products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin_products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/admin_products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin_products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin_products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/admin_categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin_categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin_categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin_categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin_categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::get('/categories/{categories}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/admin_categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/admin_sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('/admin_sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('/admin_sliders', [SliderController::class, 'store'])->name('sliders.store');
Route::get('/admin_sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
Route::put('/admin_sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
Route::delete('/admin_sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');

Route::get('/admin_blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/admin_blogs/data', [BlogController::class, 'getBlogs'])->name('blogs.data');
Route::get('/admin_blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/admin_blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/admin_blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/admin_blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/admin_blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('admin_blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/admin_blogs/{blog}', 'BlogController@show')->name('blogs.show');


