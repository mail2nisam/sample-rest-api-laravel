<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['price','name','currency','sku','category_id','is_digital','download_url','weight'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
