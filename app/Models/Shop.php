<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Shop Model class
 */
class Shop extends Model
{
    /**
     * Product function
     *
     * @return void
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}