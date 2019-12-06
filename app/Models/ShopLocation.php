<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopLocation extends Model
{

    /**
     * Relation function
     *
     * @return mixed
     */
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
}