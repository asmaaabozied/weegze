@extends('layouts.admin')
@section('title')
    {{ __('site.cities') }}
@endsection

@section('content')

    <div class="content-area">

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
{{--                            <form  action="{{route('country.up')}}" method="POST" enctype="multipart/form-data">--}}
{{--                                {{csrf_field()}}--}}
                            {{ BsForm::resource('city')->putModel($data, route('city.update', $data)) }}
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

                                        {{--                              <input type="text" class="input-field" name="name" placeholder="{{ __('site.name') }}" required="" value="">--}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.description') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('In English') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{ BsForm::textarea('description')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                                        {{--                              <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">--}}
                                    </div>
                                </div>
                                @endBsMultilangualFormTabs


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.code') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('In English') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{ BsForm::text('code') }}

                                        {{--                              <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">--}}
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.countries') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <select id="country_id" required="" name="country_id">
                                        <option value="">{{ __('site.select') }}</option>
                                        @foreach(\App\Models\Country::get() as $cat)
                                            <option value="{{ $cat->id }}" @if($data->country_id==$cat->id) selected @endif>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                                <br>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('site.edit') }}</button>
                                    </div>
                                </div>
{{--                            </form>--}}
                            {{BsForm::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
