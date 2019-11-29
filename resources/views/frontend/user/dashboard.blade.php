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

                        <div class="card mb-4">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h4 class="card-title">Info card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                        <!--card-->
                    </div>
                    <!--col-md-4-->

                    <div class="col-md-8 order-2 order-sm-1">

                        <div class="row col-sm-12">
                            <div class="col">

                                <div class="mb-4">

                                    <div class="row m-1">
                                        <div class="col-sm-10 "></div>
                                        <a type="button" data-toggle="modal" data-target="#modalLoginForm"
                                            class="col-sm-2 btn btn-outline-success bg-success ">
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
                                                        <form id="addShop" action="{{ route('admin.shop.store') }}"
                                                            method="POST" enctype="multipart/form-data">

                                                            @csrf
                                                            <div class="form-group">

                                                                <input name="shop_name" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Shop Name">
                                                            </div>


                                                            <div class="form-group">

                                                                <select name="shop_category" class="form-control"
                                                                    id="exampleFormControlSelect1">
                                                                    @foreach ($ShopCategories as $shopCategory)
                                                                    <option value="{{ $shopCategory ->id}}">
                                                                        {{ $shopCategory->category_name }}
                                                                    </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="form-group">

                                                                <textarea name="Shop_description" type="text"
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Shop Discription"></textarea>
                                                            </div>
                                                            <div class="form-group">

                                                                <input name="shop_logo" type="file" class="form-control"
                                                                    id="Shop Logo" placeholder="">
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
                        @foreach ($shops as $shop)
                        <div class="row col-sm-12">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        {{ $shop->shop_name }}
                                    </div>
                                    <!--card-header-->

                                    <div class="card-body">
                                        <div class="media">
                                            <img src="{{ asset('shop/'.$shop->shop_logo) }}"
                                                class="align-self-center mr-3" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">Shop Description</h5>
                                                <p> {{ $shop->shop_description }}</p>

                                            </div>
                                        </div>
                                    </div>
                                    <!--card-body-->
                                </div>
                                <!--card-->
                            </div>
                            <!--col-md-6-->
                        </div>
                        @endforeach

                        @else
                        <div class="alert alert-info" role="alert">
                            Press the Green button to add Shop To the dashBoard
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
