<?php

namespace App\Repositories\Backend\Shop;

use App\Models\ShopOwner;
use App\Repositories\BaseRepository;

/**
 * Used to get Shop Ower data
 *
 * ShopOwner class
 */
class ShopOwnerRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param ShopOwner $model
     */
    public function __construct(ShopOwner $model)
    {
        $this->model = $model;
    }

}
