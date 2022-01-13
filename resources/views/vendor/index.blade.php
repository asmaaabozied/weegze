@extends('layouts.vendor')

@section('content')

                    <div class="content-area">

                            @if($user->checkWarning())

                                <div class="alert alert-danger validation text-center">
                                        <h3>{{ $user->displayWarning() }} </h3> <a href="{{ route('vendor-warning',$user->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first()->id) }}"> {{trans('site.verify')}} </a>
                                </div>

                            @endif


                        @include('includes.form-success')
                        <div class="row row-cards-one">

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg1">
                                        <div class="left">
                                            <h5 class="title">@lang('site.vendororder')</h5>
                                            <span class="number">{{ count($pending) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ trans('site.views') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                                <i class="icofont-dollar"></i>--}}
                                                <img src="{{asset('images/1.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                </div>


                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg2">
                                        <div class="left">
                                            <h5 class="title">{{ trans('site.orders') }}</h5>
                                            <span class="number">{{ count($processing) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ trans('site.views') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                                <i class="icofont-truck-alt"></i>--}}
                                                <img src="{{asset('images/4.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg3">
                                        <div class="left">
                                            <h5 class="title">{{ trans('site.vendororder') }}</h5>
                                            <span class="number">{{ count($completed) }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ trans('site.views') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                                <i class="icofont-check-circled"></i>--}}
                                                <img src="{{asset('images/3.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg4">
                                        <div class="left">
                                            <h5 class="title">{{ trans('site.products') }}</h5>
                                            <span class="number">{{ count($user->products) }}</span>
                                            <a href="{{route('vendor-prod-index')}}" class="link">{{ trans('site.views') }}</a>
                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                                <i class="icofont-cart-alt"></i>--}}
                                                <img src="{{asset('images/5.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg5">
                                        <div class="left">
                                            <h5 class="title">{{ trans('site.vendororder') }}</h5>
                                            <span class="number">{{ App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->sum('qty') }}</span>
                                            <a href="{{route('vendor-order-index')}}" class="link">{{ trans('site.views') }}</a>

                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                                <i class="icofont-shopify"></i>--}}
                                                <img src="{{asset('images/6.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="wave wave-animate-slower">
                                    <div class="mycard bg6">
                                        <div class="left">
                                            <h5 class="title">{{ trans('site.vendororder') }}</h5>
                                            <span class="number">{{ App\Models\Product::vendorConvertPrice( App\Models\VendorOrder::where('user_id','=',$user->id)->where('status','=','completed')->sum('price') ) }}</span>
                                            <a href="{{route('vendor-prod-index')}}" class="link">{{ trans('site.views') }}</a>

                                        </div>
                                        <div class="right d-flex align-self-center">
                                            <div class="icon">
{{--                                               <i class="icofont-dollar-true"></i>--}}
                                                <img src="{{asset('images/2.png') }}" class="img-icon">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                            </div>
                    </div>

@endsection
