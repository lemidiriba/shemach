@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )


@section('content')

<div class="card">

    <div class="card-header text-center" googl="true">
        <h3 class="card-title"> {{  ucwords($shop_name->shop_name) }} Product List</h3>

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
                                    <input name="shop" type="hidden" value="{{ $shop_name->id }}">


                                    {{ csrf_field() }}
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
                                        <select name="product_type" class="form-control md-form" id="product_type"
                                            required>
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

                                        <input id="image_file" type="file" name="image_file"
                                            class="form-control md-form" id="inputEmail3" placeholder="" required>
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
                                            <button type="button" class="col-12 btn btn-sm btn-default"
                                                aria-label="Left Align">
                                                <i class="fa fa-info-circle fa-1x"></i>
                                            </button>

                                            <button type="button" class="col-12 btn-sm btn btn-default"
                                                aria-label="Left Align">
                                                <i class="fa fa-edit fa-1x"></i>
                                            </button>

                                            <button type="button" class="col-12 btn btn-sm btn-default"
                                                aria-label="Left Align">
                                                <i class="fa fa-trash fa-1x"></i>
                                            </button>

                                        </div>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a
                                        href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a>
                                </li>

                                <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                        aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <div class="alert alert-info alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5 googl="true"><i class="icon fas fa-info"></i> Alert!</h5>
                Info alert preview. Press the green Button to Add Product to the Shop.
            </div>
            @endif

        </div>
    </div>
    <!-- /.card-body -->


    <script>
        $.ajaxSetup({

        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        //saving product in shop
        $("#add_product").click(function(e){
            e.preventDefault();
            let form = $('#addShop')[0];
            let formData = new FormData(form);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url:'http://shemach.dev/product',
                data: formData,
                cache: false,
                contentType: false,
                processData: false

            }).done(
                function (response) {
                    $('#addshopproduct').modal('hide');
                        swal({
                            icon: 'success',
                            title: 'Product Adderd successfully',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                         })

                        console.log(response);
                        //alert( "second success" );
                        window.location.reload();

                }

            ).fail(
                function (response) {
                    Swal({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',

                    })
                    console.log(response);
                }
            );

        });

        //updating  product in a shop
        $("#edit_product").click(function (e) {
            e.preventDefault();
            let form = $('#addShop')[0];
            let formData = new FormData(form);

            $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'http://shemach.dev/product/',
            data: formData,
            cache: false,
            contentType: false,
            processData: false

            }).done(
            function (response) {
            console.log(response);
            //alert( "second success" );
            $('#modalLoginForm').modal('hide');
            }

            ).fail(
            function (response) {
            console.log(response);
            }
            );
        });

        $("#delete_product").click(function (e) {

        });
    </script>
</div>
@endsection
