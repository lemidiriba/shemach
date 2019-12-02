<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopCategoryRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    protected $shopRepository;
    protected $shopCategoryRepository;
    protected $productRepository;

    /**
     * Construct function
     *
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository,
        ShopCategoryRepository $shopCategoryRepository,
        ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
        $this->shopRepository = $shopRepository;
        $this->shopCategoryRepository = $shopCategoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $shops = $this->shopRepository->getbyuser(Auth::id());
        $shopCategories = $this->shopCategoryRepository->all();
        return view('frontend.user.dashboard')
            ->with(['shops' => $shops, 'ShopCategories' => $shopCategories]);
    }

    /**
     * Product function
     *
     * @param Int $id
     * @return void
     */
    public function product($shop_id)
    {
        $product_list = $this->productRepository->getByShop($shop_id);
        $shop_name = $this->shopRepository->getByColumn($shop_id, 'id', ['shop_name']);

        return view('frontend.user.shoplist')->with([
            'product_lists' => $product_list,
            'shop_name' => $shop_name]);
    }
}