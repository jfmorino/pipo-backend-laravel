<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'description',
        'category_id',
        'has_colors',
        'same_price',
        'size_type_id',
        'gender',
        'discount_id',
        'discount_percentage',
        'is_discount_active',
        'active'
    ];

    protected $casts = [
        'same_price' => 'boolean',
        'has_colors' => 'boolean'
    ];

    protected $with = ['variations' => ['size', 'color'], 'images', 'category', 'size_type.sizes'];

    protected $appends = ['favorite'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function size_type()
    {
        return $this->belongsTo(SizeType::class);
    }

    public function getFavoriteAttribute()
    {
        return (auth()->check() && !!Favorite::where([['user_id', auth()->id()], ['product_id', $this->id]])->first());
    }
}
