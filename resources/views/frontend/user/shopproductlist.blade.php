@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )


@section('content')

<div class="container">
    <div class="jumbotron text-center">
        <h1 class="display-4">Hello, {{ $logged_in_user->name }}</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <button class="btn btn-warning btn-lg" href="#" role="button">Edit Shop</button>
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">

                <span role="button">Add Location</span>
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">
                                {{ $shop->shop_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body is-valid">
                            <form id="addLocation" action="" method="POST" role="form">
                                <div class="input-group">
                                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                    <input name="lng" type="number" min="o" value="" placeholder="Longtude"
                                        class="form-control ml-1" required>
                                    <input name="lat" type="number" min="0" value="" placeholder="Latitude"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <button id="add_location" class="btn btn-sm btn-warning"
                                            type="submit">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </p>
    </div>
</div>

<div class="card">

    <div class="card-header text-center" googl="true">
        <h3 class="card-title"> {{  ucwords($shop->shop_name) }} Product List</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">

                <div class="col-sm-12 float-right mb-2">
                    <a type="button" data-toggle="modal" data-target="#addshopproduct"
                        class="btn btn-sm bg-default float-right">
                        <i class="fa fa-plus-circle fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="modal fade" id="addshopproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold"> Add Product
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="is-valid">
                                <form id="addShop" action="" method="POST" role="form" enctype="multipart/form-data">
                                    <!--hidden filed -->
                                    <input name="shop" type="hidden" value="{{ $shop->id }}">


                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <input name="product_name" type="text" class="form-control md-form"
                                            id="exampleFormControlInput1" placeholder="Product Name" required>
                                    </div>

                                    <div class="form-group">
                                        <select name="product_brand" class="form-control md-form" required>
                                            <option value="1">
                                                Vender
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="product_type" class="form-control md-form" required>
                                            <option value="1">
                                                Product Type
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input name="product_price" type="number" class="form-control md-form" min="1"
                                            placeholder="Price" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="product_amount" type="number" class="form-control md-form" min="1"
                                            placeholder="Product Amount" required>
                                    </div>
                                    <div class="form-group">

                                        <input type="file" name="image_file" class="form-control md-form"
                                            id="inputEmail3" placeholder="" required>
                                    </div>



                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center bg-warning">
                            <button id="add_product" type="submit" class="btn btn-default ">Add Product</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <!-- model -->

            <!--table container -->
            @if (count($product_lists) != 0)
            <div class="container">
                <div class="row ">
                    <div class="col-xs-12">
                        <table id="example1" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc text-center" tabindex="0" aria-controls="example1"
                                        rowspan="1" colspan="1" style="width: 167.217px;" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Image
                                    </th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" style="width: 225.833px;"
                                        aria-label="Browser: activate to sort column ascending">
                                        Name</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" style="width: 196.517px;"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Price(Birr)</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" style="width: 141.733px;"
                                        aria-label="Engine version: activate to sort column ascending">Amount
                                    </th>
                                    <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1"
                                        style="width: 100.7px;">
                                        Brand</th>
                                    <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1"
                                        style="width: 100.7px;">
                                        State</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($product_lists as $product_list)

                                <tr role="row" class="odd">
                                    <td class="sorting_1 w-25">
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <img alt="{{ ucwords($product_list->product_name) }}"
                                                class="card-img-top embed-responsive-item"
                                                src="{{ asset('shop_image/product_image/'.$product_list->product_image) }}" />
                                        </div>
                                    </td>
                                    <td class="text-center align-content-between">
                                        {{ ucwords($product_list->product_name) }}</td>
                                    <td class="text-center align-content-between">{{ $product_list->price }}</td>
                                    <td class="text-center align-content-between">{{ $product_list->product_amount }}
                                    </td>
                                    <td class="text-center align-content-between">{{ $product_list->product_vender_id }}
                                    </td>
                                    <td class="text-center">
                                        <div class="mt-5 row align-content-center">
                                            <button value="{{ $product_list->id }}" type="button"
                                                class="col-12 btn btn-sm btn-default product_detail"
                                                aria-label="Left Align">
                                                <i class="fa fa-info-circle fa-1x"></i>
                                            </button>
                                            <!-- data model for info btn -->


                                            <button value="{{ $product_list->id }}" type="button"
                                                class="col-12 btn-sm btn btn-default update_productbtn"
                                                aria-label="Left Align" data-toggle="modal"
                                                data-target="#updateproduct">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </button>

                                            <button value="{{ $product_list->id }}" type="button"
                                                class="col-12 btn btn-sm btn-default delete_product"
                                                aria-label="Left Align">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div class="modal fade" id="product_info" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                            <div class="row">

                                                <div class="col-4"><label class="list-group-item" for="name">Product
                                                        Name</label>
                                                </div>

                                                <div class="col-8">
                                                    <li id="name" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item" for="amount">Product
                                                        Amount</label></div>

                                                <div class="col-8">
                                                    <li id="amount" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item"
                                                        for="price">Price</label>
                                                </div>

                                                <div class="col-8">
                                                    <li id="price" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item"
                                                        for="product_detail">Product
                                                        Detail</label></div>

                                                <div class="col-8">
                                                    <li id="product_detail" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item"
                                                        for="product_type">Product
                                                        Type</label></div>

                                                <div class="col-8">
                                                    <li id="product_type" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item"
                                                        for="vender_detail">Vender
                                                        Detail</label></div>

                                                <div class="col-8">
                                                    <li id="vender_detail" class="list-group-item"></li>
                                                </div>


                                                <div class="col-4"><label class="list-group-item" for="shop_name">Shop
                                                        Name</label>
                                                </div>

                                                <div class="col-8">
                                                    <li id="shop_name" class="list-group-item">{{ $shop->shop_name }}
                                                    </li>
                                                </div>

                                            </div>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            {{-- <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                                    aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>

                            <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                    aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>

        @else
        <!-- table ends -->
        <div class="alert alert-info alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5 googl="true"><i class="icon fas fa-info"></i> Alert!</h5>
            Info alert preview. Press the green Button to Add Product to the Shop.
        </div>
        @endif

        <!-- model for update product information-->
        <div class="modal fade" id="updateproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold"> Update Product
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="update_product" role="form" action="" method="POST" enctype="multipart/form-data">

                        <div class="modal-body mx-3">

                            <div class="is-valid">

                                @method("PATCH")

                                @csrf
                                <!--hidden filed -->
                                <input id="product_id" type="hidden" value="">

                                <div class="form-group">

                                    <input id="product_name" name="product_name" type="text"
                                        class="form-control md-form" id="exampleFormControlInput1"
                                        placeholder="Product Name" required>
                                </div>

                                <div class="form-group">
                                    <select name="product_brand" class="form-control md-form" id="product_brand"
                                        required>
                                        <option value="1">
                                            Vender
                                        </option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="product_type" class="form-control md-form" id="product_type" required>
                                        <option value="1">
                                            Product Type
                                        </option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input id="product_price" name="product_price" type="number"
                                        class="form-control md-form" min="1" placeholder="Price" required>
                                </div>

                                <div class="form-group">
                                    <input id="product_amount" name="product_amount" type="number"
                                        class="form-control md-form" min="1" placeholder="Product Amount" required>
                                </div>
                                <div class="form-group">

                                    <input id="image_file" type="file" name="image_file" class="form-control md-form"
                                        id="inputEmail3" placeholder="">
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center bg-warning">
                            <button id="updateproductshop" type="submit" class="btn btn-default ">Update
                                Product</button>
                        </div>
                    </form>
                </div>

            </div>



        </div>
    </div>
    <!-- /.card-body -->


    <script>
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        ////////////////////////////////////////////////////////////
        ////////////////////Shop item Delete////////////////////////////
        ////////////////////////////////////////////////////////////

        $('.delete_product').click(function (e) {
            e.preventDefault();

            console.log('Delete pressed');
            console.log($(this).attr('value'));
            let productid = $(this).val();

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        deleteProduct(productid);


                    }
                });





        });

        function deleteProduct(productID) {
            console.log(productID);

            $.ajax({
                url: "http://shemach.test/product/delete/" + productID,
                type: 'DELETE',
                data: {
                    "productID": productID,
                },
            }).done(
                function (result) {
                    console.log(result);
                    swal("Poof! Your file has been deleted!", {
                        icon: "success",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);

                }
            ).fail(
                function (response) {
                    console.log(response);
                    //window.open(response, '_blank')
                    swal({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            )
        }



        ////////////////////////////////////////////////////////////
        ////////////////////Shop item Update////////////////////////////
        ////////////////////////////////////////////////////////////

        //updating  product in a shop
        $(".product_detail").click(function (e) {

            let product_id = $(this).attr('value');
            console.log(product_id);

            $.ajax({
                type: "GET",
                url: 'http://shemach.test/product/detail/' + product_id,
                data: {
                    'product_id': product_id
                }

            }).done(
                function (response) {
                    console.log('here');
                    console.log(response);

                    //alert( "second success" );
                    $('#product_id').html(response.id)
                    $('#name').html(response.product_name);
                    $('#amount').html(response.product_amount);
                    $('#price').html(response.price);
                    $('#product_detail').html(response.product_detail_id);
                    $('#product_type').html(response.product_type_id);
                    $('#vender_detail').html(response.product_vender_id);
                    $('#product_info').modal('show');
                }
            ).fail(
                function (response) {
                    console.log(response);
                }
            );
        });



        ////////////////////////////////////////////////////////////
        ////////////////////Shop Product////////////////////////////
        ////////////////////////////////////////////////////////////
        //saving product in shop
        $("#add_product").click(function (e) {
            e.preventDefault();
            let form = $('#addShop')[0];
            let addProductFormData = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: 'http://shemach.test/product',
                data: addProductFormData,
                cache: false,
                contentType: false,
                processData: false

            }).done(
                function (response) {
                    $('#addshopproduct').modal('hide');
                    swal({
                        icon: 'success',
                        title: 'Product Added successfully',
                        toast: true,
                        position: 'top-end',
                        button: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', swal.stopTimer)
                            toast.addEventListener('mouseleave', swal.resumeTimer)
                        }
                    })

                    console.log(response);
                    //alert( "second success" );
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);

                }

            ).fail(
                function (response) {

                    swal({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',

                    })
                    console.log(response);
                }
            );

        });


        //deleteing product in shop



        ////////////////////////////////////////////////////////////
        ////////////////////Shop Location////////////////////////////
        ////////////////////////////////////////////////////////////
        $('#add_location').click(function (e) {

            e.preventDefault();

            console.log('add location clicked');

            let form = $('#addLocation')[0];
            let locationFormData = new FormData(form);
            console.log(locationFormData);
            $.ajax({
                type: "POST",
                url: 'http://shemach.test/shop/location',
                data: locationFormData,
                cache: false,
                contentType: false,
                processData: false
            }).done(
                function (response) {
                    console.log(response);
                    $('#exampleModal').modal('hide');


                    swal({
                        icon: 'success',
                        title: response.message,
                        toast: true,
                        button: false,
                        timer: 2000,
                        timerProgressBar: true,
                    })
                }
            ).fail(
                function (response) {
                    console.log(response.responseJSON);
                    //$('#exampleModal').modal('hide');
                    swal({
                        icon: 'error',
                        title: response.responseJSON.message,
                    })
                }
            );
        });


        ///// update_product///


        $('.update_productbtn').click(function (e) {
            console.log('update_product clicked');
            e.preventDefault();

            //geting clicked id
            let proudct_id = $(this).attr("value");
            console.log('id ' + proudct_id);
            $.ajax({
                type: "GET",
                url: "http://shemach.test/product/detail/" + proudct_id,
                data: {
                    'product_id': proudct_id
                },
            }).done(function (response) {
                console.log(response);
                //window.open(response,'_blank')

                // adding previous result
                $('#product_id').val(response.id);
                $('#product_name').val(response.product_name);
                $('#product_price').val(response.price);
                $('#product_amount').val(response.product_amount);
                $('#product_name').val(response.product_name);
                $('#product_name').val(response.product_name);
                $('#updateproductshop').attr('value', response.id);


            }).fail(function (response) {
                console.log(response);
            });

            //geting product detail

        });
        /////////////////////if update pressed///////////////
        $('#updateproductshop').click(function (e) {
            e.preventDefault();
            console.log('update pressed');
            let product_id = $(this).attr('value');
            console.log("product id is " + product_id);

            let form = $('#update_product')[0];

            //console.log(formupdate);
            let localupdateform = new FormData(form);
            console.log(localupdateform);
            $.ajax({
                type: "PATCH",
                url: "http://shemach.test/product/update/"+ product_id,
                enctype: 'multipart/form-data',
                data: { 'localformdata': localupdateform},
                catch:false,
                contentType: false,
                processData: false

            }).done(function (response) {
                console.log('this is done update');
                console.log(response);
            }).fail(function (response) {
                console.log('this is fail update');

                console.log(response);
            });

        });

    </script>
</div>
@endsection
