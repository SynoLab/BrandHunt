<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'quantity', 'image', 'product_description', 'price', 'short_description', 'sku', 'category_id',
        'color', 'manufacturer', 'product_type', 'product_condition', 'height', 'weight'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(ProductGalleryImage::class);
    }
    public function reviews()
{
    return $this->hasMany(Review::class);
}

}
