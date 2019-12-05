<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopRepository;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{

    protected $shopRepository;
    protected $productRepositery;
    /**
     * Undocumented function
     *
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository, ProductRepository $productRepositery)
    {
        $this->shopRepository = $shopRepository;
        $this->productRepositery = $productRepositery;
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $shop_data = $this->shopRepository->all();
        $product_data = $this->productRepositery->all()->random(4);
        return view('frontend.index')->with(['shop_datas' => $shop_data, 'product_datas' => $product_data]);

    }
}