<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name' ,'price', 'amount'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
