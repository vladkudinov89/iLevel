<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
