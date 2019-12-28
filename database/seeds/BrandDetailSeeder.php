<?php

use App\Models\BrandDetail;
use Illuminate\Database\Seeder;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {

        // Add the master administrator, user id of 1
        BrandDetail::create(
            [
                'brand_name' => 'Apparel and Shoes',
                'brand_introduction' => '',
                'brand_detail'=> ''
                'created_by' => 1,
            ]
        );

        // Add the master administrator, user id of 1
        BrandDetail::create(
            [
                'brand_name' => 'Audio Print and Video',
                'created_by' => 1,

            ]
        );
        // Add the master administrator, user id of 1
        BrandDetail::create(
            [
                'brand_name' => 'Electronics and Phones',
                'created_by' => 1,

            ]
        );
        // // Add the master administrator, user id of 1
        // BrandDetail::create([
        //     'category_name' => 'Food and Spirits',
        //     'created_by' => 1,

        // ]);
        // Add the master administrator, user id of 1
        BrandDetail::create(
            [
                'brand_name' => 'Health and Beauty',
                'created_by' => 1,
            ]
        );

        // Add the master administrator, user id of 1
        BrandDetail::create(
            [
                'brand_name' => 'Jewelry and Gifts',
                'created_by' => 1,

            ]
        );
        // Add the master administrator, user id of 1
        // BrandDetail::create([
        //     'category_name' => 'Kids Corner',
        //     'created_by' => 1,
        // ]);
        // Add the master administrator, user id of 1
        // BrandDetail::create([
        //     'category_name' => 'Office and Services',
        //     'created_by' => 1,

        // ]);
        // Add the master administrator, user id of 1
        BrandDetail::create([
            'brand_name' => 'Sports and Outdoors',
            'created_by' => 1,

        ]);
        // Add the master administrator, user id of 1
        // BrandDetail::create([
        //     'category_name' => 'Vehicles and Garage',
        //     'created_by' => 1,

        // ]);

    }
}