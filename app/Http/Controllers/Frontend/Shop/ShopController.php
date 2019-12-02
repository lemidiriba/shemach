<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * ShopController class
 */
class ShopController extends Controller
{
    protected $shopRepository;
    protected $shopModel;

    /**
     * Construct function
     *
     * @param ShopRepository $shopRepository
     */
    public function __construct(ShopRepository $shopRepository)
    {
        $this->middleware('auth');
        $this->shopRepository = $shopRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopList = $this->shopRepository->where('user_id', Auth::id());
        return view('backend.dashboard')->with(['myShops', $shopList]);
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

        $this->validate($request, [
            'shop_name' => ['required', 'unique:shops,shop_name', 'string', 'min:3', 'max:100'],
            'shop_category' => 'required',
            'Shop_description' => ['required', 'string'],
            'shop_logo' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
        ]);

        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
            $path = $request->file('image_file')->storeAs('public/shop_image/shop_logo', $filenametostore);
        }
        //reigistering shop name to data base
        $shop_data = new Shop();
        $shop_data->shop_name = $request->shop_name;
        $shop_data->shop_logo = $filenametostore;
        $shop_data->shop_description = $request->shop_name;
        $shop_data->shop_category_id = $request->shop_category;
        $shop_data->shop_owner_id = Auth::id();
        $shop_data->created_by = Auth::user()->name;

        //Saving shop data
        if ($shop_data->save()) {
            return redirect()->route('frontend.user.dashboard');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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