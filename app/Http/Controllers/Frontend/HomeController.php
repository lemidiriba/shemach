<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShopLocation;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopLocationRepository;
use App\Repositories\Frontend\Shop\ShopRepository;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{

    protected $shopRepository;
    protected $productRepositery;
    protected $shopLocationRepository;
    /**
     * Undocumented function
     *
     * @param ShopRepository $shopRepository
     */
    public function __construct(
        ShopRepository $shopRepository,
        ProductRepository $productRepositery,
        ShopLocationRepository $shopLocationRepository
    ) {
        $this->shopLocationRepository = $shopLocationRepository;
        $this->shopRepository = $shopRepository;
        $this->productRepositery = $productRepositery;
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $shop_data = $this->shopRepository->all();
        $product_data = $this->productRepositery->all()->random(7);
        return view('frontend.index')->with(['shop_datas' => $shop_data, 'product_datas' => $product_data]);
    }
    /**
     * GetShopLocation function
     *
     * @return mixed
     */
    public function getShopLocation()
    {
        //return $allLocation = ShopLocation::all()->pluck(['shop_id', 'latitude', 'longitude']);
        return $allLocation = $this->shopLocationRepository->all(); //
        #return $allLocation->pluck(['shop_id', 'latitude', 'longitude']);
    }
}