<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productRepository;
    protected $shopRepository;

    /**
     * Constructor function
     */
    public function __construct(ProductRepository $productRepository, ShopRepository $shopRepository)
    {
        $this->productRepository = $productRepository;
        $this->shopRepository = $shopRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $this->validate($request, [
            'product_name' => ['required', 'string', 'max:191'],
            'product_type' => ['required', 'integer'],
            'product_brand' => ['required', 'integer'],
            'product_price' => ['required', 'numeric', 'min:1'],
            'image_file' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
            'product_amount' => ['required', 'numeric', 'min:1'],

        ]);

        //image file uploding
        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
        }
        //return $filenametostore;
        //saving data to product table
        $product_data = new Product();
        $product_data->product_name = $request->product_name;
        $product_data->product_image = $filenametostore;
        $product_data->product_amount = $request->product_amount;
        $product_data->price = $request->product_price;
        $product_data->product_type_id = $request->product_type;
        //null 1st time
        $product_data->product_detail_id = 1; //'empty_for_now';

        $product_data->product_vender_id = $request->product_brand;
        $product_data->shop_id = $request->shop;
        $product_data->available = 1;

        //return $product_data;

        if ($product_data->save()) {

            //full file path
            $request->file('image_file')->storeAs('public/shop_image/product_image', $filenametostore);

            return ['message' => 'Product added succefully'];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shop_id)
    {
        $product_list = $this->productRepository->getByShop($shop_id);
        $shop_name = $this->shopRepository->getByColumn($shop_id, 'id');

        return view('frontend.user.shopproductlist')
            ->with([
                'product_lists' => $product_list,
                'shop' => $shop_name,
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
