<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'Category_Name',
        'Category_Description',
        'Category_Inactive',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
