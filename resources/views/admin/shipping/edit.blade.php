    @extends('layouts.admin')
    @section('title')
        {{ __('site.Shipping Methods') }}
    @endsection
    @section('content')

        <div class="content-area">

            <div class="add-product-content1">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-description">
                            <div class="body-area">
                                @include('includes.admin.form-error')
                                {{ BsForm::resource('shipping')->putModel($data, route('admin-shipping-update', $data)) }}

{{--                                <form  action="{{route('admin-shipping-create')}}" method="POST" enctype="multipart/form-data">--}}
{{--                                    {{csrf_field()}}--}}
                                    @include('partials._errors')
                                    @bsMultilangualFormTabs
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('site.title1') }} *</h4>
                                                {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            {{ BsForm::text('title')->placeholder(trans('site.title1')) }}

                                            {{--                              <input type="text" class="input-field" name="title" placeholder="{{ __('site.title1') }}" required="" value="">--}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('site.Duration') }} *</h4>
                                                {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            {{ BsForm::text('subtitle')->placeholder(trans('site.Duration')) }}

                                            {{--                              <input type="text" class="input-field" name="subtitle" placeholder="{{ __('site.Duration') }}" required="" value="">--}}
                                        </div>
                                    </div>

                                    @endBsMultilangualFormTabs


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('site.price') }} *</h4>
                                                <p class="sub-heading">({{ __('In') }} {{ $sign->name }})</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="number" class="input-field" name="price" placeholder="{{ __('site.price') }}" required="" value="{{$data->price}}" min="0" step="0.01">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <button class="addProductSubmit-btn" type="submit">{{ __('site.edit') }}</button>
                                        </div>
                                    </div>
{{--                                </form>--}}
                                {{BsForm::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
