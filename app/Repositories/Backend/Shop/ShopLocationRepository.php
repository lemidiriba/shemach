<?php

namespace App\Repositories\Backend\Shop;



use App\Repositories\BaseRepository;
use App\Models\ShopLocation;

/**
 * Used for getting shop location
 *
 * ShopLocation class
 */
class ShopLocationRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param ShopLocation $model
     */
    public function __construct(ShopLocation $model)
    {
        $this->model = $model;
    }

}
