<?php

namespace App\Repositories\Backend\Shop;

use App\Models\Shop;
use App\Repositories\BaseRepository;


/**
 * Used to get shop data
 *
 * Shop class
 */
class ShopRepository extends BaseRepository
{

   /**
     * Construct function
     *
     * @param Shop $model
     */
    public function __construct(Shop $model)
    {
        $this->model = $model;
    }


    public function getbyuser($user_id)
    {
        return $this->where('id', $user_id)->get();
    }


}