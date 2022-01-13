@extends('layouts.admin')
@section('title')
    {{ __('site.inquiries') }}
@endsection
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.inquiries') }} <a class="add-btn"
                                                                      href="{{route('admin-inquiries-index')}}"><i
                                class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('site.inquiries') }}</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                 style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                            @include('includes.admin.form-both')


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.name') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <input name="name" value="{{$data->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.email') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <input name="email" value="{{$data->email}}" class="form-control">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.phone') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <input name="phone" value="{{$data->phone}}" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.message') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <textarea class="nic-edit-p"> {{$data->description}}</textarea>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script type="text/javascript">

        {{-- TAGIT --}}

        $("#metatags").tagit({
            fieldName: "meta_tag[]",
            allowSpaces: true
        });

        $("#tags").tagit({
            fieldName: "tags[]",
            allowSpaces: true
        });
        {{-- TAGIT ENDS--}}
    </script>

@endsection
