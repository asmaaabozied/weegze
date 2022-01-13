@extends('layouts.admin')
@section('title')
    {{ __('site.Currencies') }}
@endsection
@section('content')

    <div class="content-area">

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form action="{{route('admin-currency-create')}}" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                @include('partials._errors')

                                @bsMultilangualFormTabs

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.name') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{ BsForm::text('name')->placeholder(trans('site.name')) }}
                                    </div>
                                </div>
                                @endBsMultilangualFormTabs


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.Sign') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="sign"
                                               placeholder="{{ __('site.Sign') }}" required="" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.key') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="key"
                                               placeholder="{{ __('site.key') }}" required="" value="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.value') }} *</h4>
                                            {{--                                <small>{{ __('(Please Enter The Value For 1 USD = ?)') }}</small>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="number" class="input-field" name="value"
                                               placeholder="{{ __('site.value') }}" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">@lang('site.status') *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <label class="switch">
                                            <input type="checkbox" name="is_default" value="1">
                                            <span class="slider round"></span>
                                        </label></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('site.add') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
