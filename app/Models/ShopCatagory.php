<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

class ShopCatagory extends Model
{
    public function Shop()
    {
        return $this->hasMany(Shop::class);
    }
}