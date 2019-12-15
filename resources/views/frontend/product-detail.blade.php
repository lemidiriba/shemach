@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


<!-- ========================= SECTION TOPBAR ========================= -->
<section class="section-topbar border-top padding-y-sm">
    <div class="container">
        <span>Supplier: Manufacturer of China Co., Ltd.</span> &nbsp <span class="text-warning">2 years</span>
        <div class="float-right dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">English</a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Russian </a>
                <a class="dropdown-item" href="#">Arabic </a>
            </div>
        </div>
    </div> <!-- container.// -->
</section>
<!-- ========================= SECTION TOPBAR .// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
    <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category name</a></li>
                <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-xl-10 col-md-9 col-sm-12">


                <main class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-6 border-right">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap p-2">
                                    <div>
                                        <a href="{{ asset('/shop_image/product_image/'.$product_data->product_image) }}"
                                            data-fancybox="">
                                            <img class="img-fluid"
                                                src="{{ asset('/shop_image/product_image/'.$product_data->product_image) }}">
                                        </a>
                                    </div>
                                </div> <!-- slider-product.// -->
                                <div class="img-small-wrap">
                                    <div class="item-gallery"> <img
                                            src="{{ asset('/shop_image/product_image/'.$product_data->product_image) }}">
                                    </div>

                                </div> <!-- slider-nav.// -->
                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-6">
                            <article class="card-body">
                                <!-- short-info-wrap -->
                                <h3 class="title mb-3">{{ ucwords($product_data->product_name) }} from
                                    {{ ucwords($shop_info->shop_name) }}</h3>

                                <div class="mb-3">
                                    <var class="price h3 text-warning">
                                        <span class="currency">Birr </span><span
                                            class="num">{{ $product_data->price }}</span>
                                    </var>
                                    <span>/Single</span>
                                </div> <!-- price-detail-wrap .// -->
                                <dl>
                                    <dt>Description</dt>
                                    <dd>
                                        <p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco </p>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3">Model#</dt>
                                    <dd class="col-sm-9">12345611</dd>

                                    <dt class="col-sm-3">Color</dt>
                                    <dd class="col-sm-9">Black and white </dd>

                                    <dt class="col-sm-3">Delivery</dt>
                                    <dd class="col-sm-9">Russia, USA, and Europe </dd>
                                </dl>
                                <div class="rating-wrap">

                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <div class="label-rating">132 reviews</div>
                                    <div class="label-rating">154 orders </div>
                                </div> <!-- rating-wrap.// -->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Quantity: </dt>
                                            <dd>
                                                <select class="form-control form-control-sm" style="width:70px;">
                                                    @for ($i = 1; $i <= $product_data->available; $i++)
                                                        <option value="{{ $i }}"> {{ $i }} </option>
                                                        @endfor

                                                </select>
                                            </dd>
                                        </dl> <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                    <div class="col-sm-7">
                                        <dl class="dlist-inline">
                                            <dt>Size: </dt>
                                            <dd>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" name="inlineRadioOptions"
                                                        id="inlineRadio2" value="option2" type="radio">
                                                    <span class="form-check-label">SM</span>
                                                </label>

                                            </dd>
                                        </dl> <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <hr>
                                <a href="#" class="btn  btn-warning"> <i class="fa fa-envelope"></i> Contact Supplier
                                </a>
                                <a href="#" class="btn  btn-outline-warning"> Supplier Information </a>
                                <!-- short-info-wrap .// -->
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </main> <!-- card.// -->

                <!-- PRODUCT DETAIL -->
                <article class="card mt-3">
                    <div class="card-body">
                        <h4>{{ ucwords($shop_info->shop_name) }} Shop overview</h4>
                        <div class="row-sm">
                            @if (count($shop_items) > 0)
                            @foreach ($shop_items as $item)
                            <div class="col-md-3 col-sm-6">
                                <figure class="card card-product">
                                    <div class="img-wrap"> <img
                                            src="{{ asset('shop_image/product_image/'.$item->product_image) }}">
                                    </div>
                                    <figcaption class="info-wrap">
                                        <a href="#" class="title">{{ $item->product_name }}</a>
                                        <div class="price-wrap">
                                            <span class="price-new">{{ $item->price }}</span>
                                            <del
                                                class="price-old">{{ (int)(($item->price)+($item->price*(8/100))) }}</del>
                                        </div>
                                        <!-- price-wrap.// -->
                                    </figcaption>
                                </figure>
                                <!-- card // -->
                            </div>
                            @endforeach
                            @else

                            @endif

                        </div> <!-- card-body.// -->
                </article> <!-- card.// -->

                <!-- PRODUCT DETAIL .// -->

            </div> <!-- col // -->
            <aside class="col-xl-2 col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Promotion
                    </div>
                    <div class="card-body small">
                        <span>China | Trading Company</span>
                        <hr>
                        Transaction Level: Good <br>
                        Supplier Assessments: Best

                        <a href="">Visit pofile</a>

                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->

                <div class="card mt-3">
                    <div class="card-header">
                        You may like
                    </div>
                    <div class="card-body row">

                        @if (count($recomanded_items) > 0)
                        @foreach ($recomanded_items as $item)
                        <div class="col-md-12 col-sm-3">
                            <figure class="item border-bottom mb-3">
                                <a href="#" class="img-wrap"> <img class="img-fluid"
                                        src="{{ asset('/shop_image/product_image/'.$item->product_image) }}"
                                        class="img-md"></a>
                                <figcaption class="info-wrap">
                                    <a href="#" class="title">{{ ucwords($item->shop->shop_name) }}</a>
                                    <div class="price-wrap mb-3">
                                        <span class="price-new">{{ $item->price }}</span> <del
                                            class="price-old">{{ (int)(($item->price)+($item->price*(8/100))) }}</del>
                                    </div> <!-- price-wrap.// -->
                                </figcaption>
                            </figure> <!-- card-product // -->
                        </div><!-- col.// -->
                        @endforeach

                        @endif


                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->
            </aside> <!-- col // -->
        </div> <!-- row.// -->



    </div><!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection
