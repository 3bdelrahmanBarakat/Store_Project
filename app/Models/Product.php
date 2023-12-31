<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'image', 'size_chart' , 'price', 'discount_price', 'category_id','color','size','quantity','created_at'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }




}
