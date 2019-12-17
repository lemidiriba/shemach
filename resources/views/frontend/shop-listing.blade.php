@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-intro bg-one padding-y-lg pb-0 pt-1">
    <div class="row">
        <div class="col-sm-6 mx-auto bg-dark-50">
            <article class="white text-center mb-5">
                <img class="img-fluid img-thumbnail" style="max-width:25%;"
                    src="{{ asset('/shop_image/shop_logo/'.$shopdata->Shop_logo) }}" alt="{{ $shopdata->shop_name }}">
                <h1 class="display-3">{{ $shopdata->shop_name }}</h1>
                <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars
                    extend the width of the viewport, others are confined within... For positioning of navbars, checkout
                    .</p>
            </article>

        </div> <!-- col.// -->
    </div> <!-- row.// -->
</section> <!-- section-intro.// -->
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-sm-3">

                <div class="card card-filter">
                    <article class="card-group-item">
                        <header class="card-header">
                            <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Category</h6>
                            </a>
                        </header>
                        <div style="" class="filter-content collapse show" id="collapse22">
                            <div class="card-body">
                                <form class="pb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <ul class="list-unstyled list-lg">
                                    <li><a href="#">Total Items <span
                                                class="float-right badge badge-light round">{{ count($shopproducts) }}</span>
                                        </a></li>

                                </ul>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse33">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Price </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse33">
                            <div class="card-body">
                                <input type="range" class="custom-range" min="0" max="100" name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" placeholder="$0" type="number">
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input class="form-control" placeholder="$1,0000" type="number">
                                    </div>
                                </div> <!-- form-row.// -->
                                <button class="btn btn-block btn-outline btn-secondary">Apply</button>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse44">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Feature </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse44">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" value="" type="checkbox">
                                        <span class="form-check-label">
                                            <span class="float-right badge badge-light round">5</span>
                                            Samsung
                                        </span>
                                    </label> <!-- form-check.// -->

                                </form>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->

                <div class="card mt-2">
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
            </aside> <!-- col.// -->

            <main class="col-sm-9">

                @if (count($shopproducts) > 0)
                @foreach ($shopproducts as $item)
                <article id="shopdata" class="card card-product">
                    <div class="card-body">

                        <div class="row">


                            <aside class="col-sm-3">
                                <div class="img-wrap img-fluid">
                                    <a href="{{ asset('/shop_image/product_image/'.$item->product_image) }}"
                                        data-fancybox="">
                                        <img src="{{ asset('/shop_image/product_image/'.$item->product_image) }}">
                                    </a>


                                </div>
                            </aside> <!-- col.// -->
                            <article class="col-sm-6">
                                <h4 class="title"> {{ $item->product_name }} </h4>
                                <div class="rating-wrap  mb-2">
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
                                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit
                                    amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>
                                <dl class="dlist-align">
                                    <dt>Color</dt>
                                    <dd>Black and white</dd>
                                </dl> <!-- item-property-hor .// -->
                                <dl class="dlist-align">
                                    <dt>Material</dt>
                                    <dd>Syntetic, wooden</dd>
                                </dl> <!-- item-property-hor .// -->
                                <dl class="dlist-align">
                                    <dt>Delivery</dt>
                                    <dd>Russia, USA, and Europe</dd>
                                </dl> <!-- item-property-hor .// -->

                            </article> <!-- col.// -->
                            <aside class="col-sm-3 border-left">
                                <div class="action-wrap">
                                    <div class="price-wrap h4">
                                        <span class="price"> {{$item->price }}</span>
                                        <del
                                            class="price-old">{{ (int)(($item->price) +($item->price * (8/100))) }}</del>
                                    </div> <!-- info-price-detail // -->

                                    <br>
                                    <p>
                                        <a id="get-contact" href="#" class="btn btn-warning" value="{{ $item->id }}"
                                            data-toggle="modal" data-target="#supplier_contact_model"> <i
                                                class="fa fa-tty fa-lg"></i> </a>
                                        <a href="/product-detail/{{ $item->id }}" class="btn btn-secondary"> <i
                                                class="fas fa-info fa-fw"></i></a>
                                    </p>
                                    <div class="modal fade" id="supplier_contact_model" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">

                                                        <li id="shopowner_name" class="list-group-item"></li>
                                                        <li id="shopowner_email" class="list-group-item"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href=""><i class="fa fa-heart"></i> Add to
                                        wishlist</a>
                                </div> <!-- action-wrap.// -->
                            </aside> <!-- col.// -->

                        </div> <!-- row.// -->


                    </div> <!-- card-body .// -->
                </article> <!-- card product .// -->
                @endforeach
                @else
            </main> <!-- col.// -->


            @endif
        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg-white padding-y">
    <div class="container">
        <h4>Another section if needed</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#get-contact").click(function (e) {

        let shopOwner = $(this).attr('value');
        console.log("shop Owner ID " + shopOwner);

        $.ajax({
            type: "GET",
            url: "http://shemach.test/shop-owner/" + shopOwner,
            data: {
                'shopOwner' : shopOwner,
            }

        }).done(function (response) {
            console.log('this is done');
            console.log(response);
            $('#shopowner_name').html(response.first_name +' '+ response.last_name);
            $('#shopowner_email').html(response.email);
        }).fail(function (response) {
            console.log('this is fail');
            console.log(response);
         });

    });

</script>
@endsection
