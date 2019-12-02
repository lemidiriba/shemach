@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>
                    <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
                </strong>
            </div>
            <!--card-header-->

            <div class="card-body">
                <div class="row">
                    <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                        <div class="card mb-4 bg-light">
                            <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ $logged_in_user->name }}<br />
                                </h4>

                                <p class="card-text">
                                    <small>
                                        <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br />
                                        <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined')
                                        {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                    </small>
                                </p>

                                <p class="card-text">

                                    <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                        <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                    </a>

                                    @can('view backend')
                                    &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                        <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                    </a>
                                    @endcan
                                </p>
                            </div>
                        </div>


                    </div>
                    <!--col-md-4-->

                    <div class="col-md-8 order-2 order-sm-1">

                        <div class="row col-sm-12">
                            <div class="col">

                                <div class="card mb-4">

                                    <div class="card-body">
                                        <a type="button" data-toggle="modal" data-target="#modalLoginForm"
                                            class="btn bg-success float-right">
                                            <i class="fa fa-plus fa-inverse"></i>
                                        </a>
                                    </div>
                                    <!--card-header-->
                                    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Create Shop</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body mx-3">
                                                    <div class="is-valid">
                                                        <form id="addShop" action="{{ route('frontend.shop.store') }}"
                                                            method="POST" role="form" enctype="multipart/form-data">

                                                            {{ csrf_field() }}
                                                            <div class="form-group">

                                                                <input value="" name="shop_name" type="text"
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Shop Name" required>
                                                            </div>


                                                            <div class="form-group">

                                                                <select name="shop_category" class="form-control"
                                                                    id="exampleFormControlSelect1" required>
                                                                    @foreach ($ShopCategories as $shopCategory)
                                                                    <option value="{{ $shopCategory ->id}}">
                                                                        {{ $shopCategory->category_name }}
                                                                    </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="form-group">

                                                                <textarea name="Shop_description" type="text" required
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Shop Discription"></textarea>
                                                            </div>
                                                            <div class="form-group">

                                                                <input type="file" name="image_file"
                                                                    class="form-control" id="inputEmail3" placeholder=""
                                                                    required>
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




                                </div>
                                <!--card-->
                            </div>
                            <!--col-md-6-->
                        </div>

                        @if (count($shops) != 0)
                        <div class="row col-sm-12">
                            @foreach ($shops as $shop)

                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('shop_image/shop_logo/'.$shop->Shop_logo) }}"
                                                alt="Shop Logo">
                                        </div>

                                        <h3 class="profile-username text-center">{{ $shop->shop_name }}</h3>

                                        <p class="text-muted text-center">{{ $shop->created_by }}</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Total Product</b> <a class="float-right">1,322</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Currunt</b> <a class="float-right">543</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Moved Out</b> <a class="float-right">13,287</a>
                                            </li>
                                        </ul>

                                        <a href="product/{{ $shop->id }}"
                                            class="btn btn-primary btn-block"><b>View</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                            </div>

                            <!--col-md-6-->

                            @endforeach
                        </div>
                        @else
                        <div class="alert alert-info alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 googl="true"><i class="icon fas fa-info"></i> Alert!</h5>
                            Info alert preview. Press the green Button to Add Shop to the Dashboard.
                        </div>
                        @endif



                        <!--row-->


                    </div>
                    <!--col-md-8-->
                </div><!-- row -->
            </div> <!-- card-body -->
        </div><!-- card -->
    </div><!-- row -->
</div><!-- row -->
@endsection
