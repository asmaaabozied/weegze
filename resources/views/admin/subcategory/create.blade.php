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

                                    <h4 class="heading">{{__('site.add')}} {{ __('site.category') }} </h4>

                                </div>
                            </div>
                            @include('includes.admin.form-error')
                            <form action="{{route('admin-subcat-create')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @include('partials._errors')
                                @bsMultilangualFormTabs


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.name') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('In Any Language') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        {{ BsForm::text('name')->placeholder(trans('site.name')) }}
                                        {{--                            <input type="text" class="input-field" name="title" placeholder="{{ __('Title') }}" required="" value="{{ Request::old('title') }}">--}}
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
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                                        <button class="addProductSubmit-btn" type="submit">{{ __("site.add") }}</button>
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
