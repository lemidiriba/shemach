<?php

namespace App\Repositories\Frontend\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

/**
 * Used to get shop data
 *
 * Shop class
 */
class ProductRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param Shop $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Undocumented function
     *
     * @param Int $shop_id
     * @return void
     */
    public function getByShop($shop_id)
    {
        return $this->where('shop_id', $shop_id)->all()->random(2);
    }




    /**
     * AutoComplet function
     *
     * @param string $text
     * @return json
     */
    public function getAutoComplete($shop_id, $text)
    {
        return $this
            ->where('shop_id', $shop_id)
            ->where("product_name", "%{$text}%", "LIKE")
            ->get();
    }
}