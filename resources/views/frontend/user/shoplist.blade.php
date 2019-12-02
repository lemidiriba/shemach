@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<div class="card">

    <div class="card-header text-center" googl="true">
        <h3 class="card-title"> {{ $shop_name->shop_name }} Product List</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">

                <div class="col-sm-12 float-right mb-2">
                    <a type="button" data-toggle="modal" data-target="#modalLoginForm"
                        class="btn bg-success float-right">
                        <i class="fa fa-plus fa-inverse"></i>
                    </a>
                </div>
            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                <form id="addShop" action="{{ route('frontend.shop.store') }}" method="POST" role="form"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <input value="" name="shop_name" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Shop Name" required>
                                    </div>


                                    <div class="form-group">

                                        <select name="shop_category" class="form-control" id="exampleFormControlSelect1"
                                            required>

                                            <option value="">
                                                hooo
                                            </option>


                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <textarea name="Shop_description" type="text" required class="form-control"
                                            id="exampleFormControlInput1" placeholder="Shop Discription"></textarea>
                                    </div>
                                    <div class="form-group">

                                        <input type="file" name="image_file" class="form-control" id="inputEmail3"
                                            placeholder="" required>
                                    </div>



                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center bg-warning">
                            <button type="submit" class="btn btn-default bg-">Create</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <!-- model -->
            @if (count($product_lists) != 0)
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 167.217px;" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 225.833px;" aria-label="Browser: activate to sort column ascending">
                                    Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 196.517px;"
                                    aria-label="Platform(s): activate to sort column ascending">
                                    Price(Birr)</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    style="width: 141.733px;"
                                    aria-label="Engine version: activate to sort column ascending">Type
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 100.7px;">
                                    State</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">Gecko</td>
                                <td>Firefox 1.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
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
</div>
@endsection
