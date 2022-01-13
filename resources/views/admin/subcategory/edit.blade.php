@extends('layouts.admin')
@section('title')
    {{ __("site.category") }}
@endsection
@section('content')

    <div class="content-area">

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="row">
                                <div class="col-lg-3">

                                    <h4 class="heading">{{__('site.edit')}} {{ __('site.category') }} </h4>

                                </div>
                            </div>
                            @include('includes.admin.form-error')
{{--                            <form id="geniusformdata" action="{{route('admin-subcat-update',$data->id)}}" method="POST"--}}
{{--                                  enctype="multipart/form-data">--}}
{{--                                {{csrf_field()}}--}}
                            {{ BsForm::resource('subcat')->putModel($data, route('admin-subcat-update', $data)) }}
                            @include('partials._errors')

                                @bsMultilangualFormTabs


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("site.name") }} *</h4>
                                            {{--                                <p class="sub-heading">(In Any Language)</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{ BsForm::text('name')->placeholder(trans('site.name')) }}

                                        {{--                              <input type="text" class="input-field" name="name" placeholder="{{ __("Enter Name") }}" required="" value="{{$data->name}}">--}}
                                    </div>
                                </div>

                                @endBsMultilangualFormTabs

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.slug') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    {{ BsForm::text('slug')->placeholder(trans('site.slug')) }}
                                </div>
                            </div>


                            <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("site.category") }}*</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select name="category_id" required="">
                                            <option value="">{{ __("site.Select Category") }}</option>
                                            @foreach($cats as $cat)
                                                <option
                                                    value="{{ $cat->id }}" {{ $data->category_id == $cat->id ? 'selected' :'' }}>{{ $cat->name }}</option>
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
                                        <button class="addProductSubmit-btn"
                                                type="submit">{{ __("site.save") }}</button>
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
