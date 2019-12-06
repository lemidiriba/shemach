<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ShopCatagory;
use Illuminate\Database\Eloquent\Model;

/**
 * Shop Model class
 */
class Shop extends Model
{
    /**
     * @return void
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    /**
     * @return mixed
     */
    public function shopcategory()
    {
        return $this->belongsTo(ShopCatagory::class);
    }
    /**
     * @return mixed
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
