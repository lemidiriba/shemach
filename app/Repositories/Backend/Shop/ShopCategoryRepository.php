<?php

namespace App\Repositories\Backend\Shop;

use App\Models\ShopCatagory;
use App\Repositories\BaseRepository;

/**
 * Used To set shop category
 *
 * ShopCategory class
 */
class ShopCategoryRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param ShopCatagory $model 
     */
    public function __construct(ShopCatagory $model)
    {
        $this->model = $model;
    }

}