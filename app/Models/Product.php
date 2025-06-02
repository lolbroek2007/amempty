<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'inventory';

    protected $fillable = [
        'Product_Name',
        'Product_Description',
        'Product_Quantity',
        'Product_Price',
        'Product_Inactive',
        'Category_ID',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'Category_ID');
    }
}
