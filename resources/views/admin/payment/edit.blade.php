@extends('layouts.admin')
@section('title')
    {{ __('site.edit') }}
@endsection
@section('content')

    <div class="content-area">

        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.edit') }} <a class="add-btn" href="{{ url()->previous() }}"><i
                                class="fas fa-arrow-left"></i> {{ __("site.back") }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('site.Payment Settings') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-payment-edit',$data->id) }}">{{ __('site.edit') }}</a>
                        </li>
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
                            {{--                      <form  action="{{route('admin-payment-update',$data->id)}}" method="POST" enctype="multipart/form-data">--}}
                            {{--                        {{csrf_field()}}--}}

                            {{ BsForm::resource('payment')->putModel($data, route('admin-payment-update', $data)) }}

                            @bsMultilangualFormTabs


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.title1') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    {{ BsForm::text('title')->placeholder(trans('site.title1')) }}

                                    {{--                              <input type="text" class="input-field" name="title" placeholder="{{ __('site.title1') }}{{ __('Title') }}" required="" value="">--}}
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.Subtitle') }} *</h4>
                                        <p class="sub-heading">{{ __('(Optional)') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    {{ BsForm::text('subtitle')->placeholder(trans('site.Subtitle')) }}

                                    {{--                              <input type="text" class="input-field" name="subtitle" placeholder="{{ __('site.Subtitle') }}" value="">--}}

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">
                                            {{ __('site.description') }} *
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    {{ BsForm::textarea('details')->rows(5)->placeholder(trans('site.description'))->attribute('class','nic-edit') }}

                                    {{--                              <textarea  class="nic-edit" name="details" placeholder="{{ __('site.description') }}"></textarea>--}}
                                </div>
                            </div>

                            @endBsMultilangualFormTabs

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                                </div>
                            </div>
                            {{--                      </form>--}}
                            {{BsForm::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
