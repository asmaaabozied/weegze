@extends('layouts.vendor')
@section('styles')

    <link href="{{asset('assets/vendor/css/product.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>

@endsection
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading"> {{ trans('site.products') }} <a class="add-btn"
                                                                         href="{{ route('vendor-prod-index') }}"><i
                                class="fas fa-arrow-left"></i> {{ trans('site.back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor-dashboard') }}">{{ trans('site.dashboard')}}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ trans('site.edit') }} </a>
                        </li>

                        <li>
                            <a href="{{ route('vendor-prod-edit',$data->id) }}">{{ trans('site.edit') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{ BsForm::resource('prod')->putModel($data, route('vendor-prod-update', $data)) }}
        @include('partials._errors')
        <div class="row">
            <div class="col-lg-8">
                <div class="add-product-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-description">
                                <div class="body-area">

                                    @bsMultilangualFormTabs

                                    <div class="row">

                                        <div class="col-lg-12">
                                            {{ BsForm::text('name')->label(trans('site.name'))}}

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="text-editor">
                                                {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->label(trans('site.description')) }}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-editor">
                                            {{--                                            <textarea class="nic-edit-p" name="policy"></textarea>--}}
                                            {{ BsForm::textarea('policy')->attribute('class', 'nic-edit-p')->label(trans('site.Product Buy/Return Policy')) }}

                                        </div>
                                    </div>

                                    @endBsMultilangualFormTabs

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.category") }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <select id="cat" name="category_id" required="">
                                                <option>{{ __("site.Select Category") }}</option>

                                                @foreach($cats as $cat)
                                                    <option data-href="{{ route('admin-subcat-load',$cat->id) }}"
                                                            value="{{$cat->id}}" {{$cat->id == $data->category_id ? "selected":""}}>
                                                        {{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">@lang('site.taxes')*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <select id="tax_id" name="tax_id" required="">
                                                <option value="">@lang('site.select')</option>
                                                @foreach(\App\Models\Tax::get() as $cat)
                                                    <option value="{{ $cat->id }}"
                                                            @if($data->tax_id)  selected @endif>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.Sub Category") }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <select id="subcat" name="subcategory_id">
                                                <option value="">{{ __("site.Select Sub Category") }}</option>
                                                @if($data->subcategory_id == null)
                                                    @foreach($data->category->subs as $sub)
                                                        <option data-href="{{ route('admin-childcat-load',$sub->id) }}"
                                                                value="{{$sub->id}}">{{$sub->name}}</option>
                                                    @endforeach
                                                @else
                                                    @foreach($data->category->subs as $sub)
                                                        <option data-href="{{ route('admin-childcat-load',$sub->id) }}"
                                                                value="{{$sub->id}}" {{$sub->id == $data->subcategory_id ? "selected":""}}>
                                                            {{$sub->name}}</option>
                                                    @endforeach
                                                @endif


                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.Child Category") }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <select id="childcat" name="childcategory_id"
                                                {{$data->subcategory_id == null ? "disabled":""}}>
                                                <option value="">{{ __("Select Child Category") }}</option>
                                                @if($data->subcategory_id != null)
                                                    @if($data->childcategory_id == null)
                                                        @foreach($data->subcategory->childs as $child)
                                                            <option value="{{$child->id}}">{{$child->name}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($data->subcategory->childs as $child)
                                                            <option value="{{$child->id}} "
                                                                {{$child->id == $data->childcategory_id ? "selected":""}}>{{$child->name}}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" name="seo_check" value="1" class="checkclick"
                                                       id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
                                                <label for="allowProductSEO">{{ trans('site.meta_tag')}}</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="checkbox" name="seo_check" value="1" class="checkclick"
                                                   id="allowProductSEO"
                                                {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
                                            <label for="allowProductSEO">{{ __("Allow Product SEO") }}</label>
                                        </div>
                                    </div>


                                    <div
                                        class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __("site.Meta Tags") }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <ul id="metatags" class="myTags">
                                                    @if(!empty($data->meta_tag))
                                                        @foreach ($data->meta_tag as $element)
                                                            <li>{{  $element }}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        {{ __("site.Meta Description") }} *
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-editor">
													<textarea name="meta_description" class="input-field"
                                                              placeholder="{{ __("site.Meta Description") }}">{{ $data->meta_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="addProductSubmit-btn"
                                                    type="submit">{{ trans('site.save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="add-product-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-description">


                                <div class="body-area">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.Feature Image") }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="panel panel-body">
                                                <div class="span4 cropme text-center" id="landscape"
                                                     style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">
                                                    <a href="javascript:;" id="crop-image"
                                                       class="d-inline-block mybtn1">
                                                        <i class="icofont-upload-alt"></i> {{ __("Upload Image Here") }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="feature_photo" name="photo" value="{{ $data->photo }}">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ __("site.images") }} *
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="javascript" class="set-gallery" data-toggle="modal"
                                               data-target="#setgallery">
                                                <input type="hidden" value="{{$data->id}}">
                                                <i class="icofont-plus"></i> {{ __("site.Set Gallery") }}
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="license" value="license">


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">
                                                    {{ trans('site.price') }}*
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="price" step="0.1" type="number" class="input-field form-control" placeholder="{{ trans('site.price') }}" value="{{round($data->price * $sign->value , 2)}}" required="" min="0" id="prices">
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-lg-12">
                                            <label>{{ __('site.type') }}</label>
                                            <select class="form-control" name="typetax_id" id="selecttype">
                                                <option></option>

                                                <option value="Percentage">{{trans('site.Percentage')}}</option>
                                                <option value="Fixed value">{{trans('site.Fixed value')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="left-area">
                                                <h4 class="heading">{{ __('site.discount') }} *</h4>
                                                <p class="sub-heading">@lang('site.Optional')</p>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            {{ BsForm::number('discount discount')->attribute('class', 'input-field discount')->placeholder(trans('site.discount'))->value($data->discount) }}

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">@lang('site.Productdiscount')*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="previous_price" step="0.01" type="number"
                                                   class="input-field"
                                                   placeholder="" min="0" id="afterdiscount" value="{{$data->previous_price}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.url") }}*</h4>
                                                <p class="sub-heading">{{ __("(site.Optional)") }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="youtube" type="text" class="input-field"
                                                   placeholder="Enter Youtube Video URL" value="{{$data->youtube}}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="featured-keyword-area">

                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('site.Feature Tags') }}</h4>
                                                </div>

                                                <div class="feature-tag-top-filds" id="feature-section">
                                                    @if(!empty($data->features))

                                                        @foreach($data->features as $key => $data1)

                                                            <div class="feature-area">
                                                                <span class="remove feature-remove"><i
                                                                        class="fas fa-times"></i></span>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <input type="text" name="features[]"
                                                                               class="input-field"
                                                                               placeholder="{{ __("Enter Your Keyword") }}"
                                                                               value="{{ $data->features[$key] }}">
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div
                                                                            class="input-group colorpicker-component cp">
                                                                            <input type="text" name="colors[]"
                                                                                   value="{{ $data->colors[$key] ?? ''}}"
                                                                                   class="input-field cp"/>
                                                                            <span
                                                                                class="input-group-addon"><i></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        @endforeach
                                                    @else

                                                        <div class="feature-area">
                                                            <span class="remove feature-remove"><i
                                                                    class="fas fa-times"></i></span>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <input type="text" name="features[]"
                                                                           class="input-field"
                                                                           placeholder="{{ __("Enter Your Keyword") }}">
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="input-group colorpicker-component cp">
                                                                        <input type="text" name="colors[]"
                                                                               value="#000000"
                                                                               class="input-field cp"/>
                                                                        <span class="input-group-addon"><i></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                </div>

                                                <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i
                                                        class="icofont-plus"></i> {{ __("site.add") }}</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.Tags") }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul id="tags" class="myTags">
                                                @if(!empty($data->tags))
                                                    @foreach ($data->tags as $element)
                                                        <li>{{  $element }}</li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <label for="">{{trans('site.USe Currency')}}</label>

                                    <input type="checkbox" name="use_currency" id="use_currency"  value="1"  onclick="show_checked()" checkes="false">
                                    {{--                                        {{ BsForm::checkbox('use_currency')->attribute('id', 'use_currency') }}--}}

                                    @foreach(\App\Models\Currency::get() as $currency)
                                        <input type="hidden" name="currency_id[]" value="{{$currency->id}}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">{{trans('site.price')}}{{$currency->name}}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="text" name="currency[]" id="{{$currency->key}}" data-value="{{$currency->value}}"
                                                       class="form-control currecny" data-key="{{$currency->key}}" onkeyup="Checkedkeyed(this)" value="{{$data->showProductCurrency($currency->id)}}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">@lang('site.status') *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1"
                                                       @if($data->status) checked @endif>
                                                <span class="slider round"></span>
                                            </label></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        </form>--}}
        {{BsForm::close()}}

        <div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ __("Image Gallery") }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="top-area">
                            <div class="row">
                                <div class="col-sm-6 text-right">
                                    <div class="upload-img-btn">
                                        <form method="POST" enctype="multipart/form-data" id="form-gallery">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="pid" name="product_id" value="">
                                            <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                                   accept="image/*" multiple>
                                            <label for="image-upload" id="prod_gallery"><i
                                                    class="icofont-upload-alt"></i>{{ __("Upload File") }}</label>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                            class="fas fa-check"></i> {{ __("Done") }}</a>
                                </div>
                                <div class="col-sm-12 text-center">(
                                    <small>{{ __("You can upload multiple Images.") }}</small>
                                    )
                                </div>
                            </div>
                        </div>
                        <div class="gallery-images">
                            <div class="selected-image">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        @section('scripts')

            <script>

                function Checkedkeyed (data) {

                    if ($('#use_currency').attr('checkes') == 'true') {

                        var use_currency = $("#use_currency").val();


                        var currency_from_key = $(data).data('key');
                        var price = $(data).val();

                        // console.log(change_currency(currency_from_key,'EGP',price));

                        var divs = document.getElementsByClassName('currecny');

                        console.log(divs);
                        var currency_to_key = '';
                        for (let i = 0; i < divs.length; ++i) {
                            currency_to_key = divs[i].getAttribute('data-key');
                            divs[i].value = change_currency(currency_from_key, currency_to_key, price);
                        }


                        // }

                        function change_currency(from_currecny, to_cuurency, price) {
                            let CurrencyJson = @json($currecny_json);

                            return Math.round(CurrencyJson[from_currecny][to_cuurency] * price);
                        }
                    }
                }
                function show_checked() {
                    if ($('#use_currency').attr('checkes') == 'false') {
                        // $(this).prop('checked',true);

                        $('input[name="use_currency"]').attr('checkes', 'true');



                        // }else{
                        //         $(this).prop('checked',false);
                        //
                        //         // $('input[name="use_currency"]').prop('checked', false);
                        //
                        //     }

                    }else if($('#use_currency').attr('checkes')=='true') {

                        $('input[name="use_currency"]').attr('checkes','false');

                    }



                    if ($('#use_currency').attr('checkes') == 'true') {

                        Checkedkeyed();

                        // alert($('#use_currency').attr('checkes'));

                    }else if($('#use_currency').attr('checkes') == 'false'){

                        console.log('error');


                        // }

                    }
                }
                // var  use_currency = $("#use_currency").val();
                // alert($('input[name="use_currency"]').attr('checked'));
                // if($('input[name="use_currency"]').is(':checked')){
                // if(document.getElementById('use_currency').checked) {
                // $("#use_currency").click(function() {


                // if(("#use_currency").is('checked',true)) {

                // if($('input[name="use_currency"]').attr('checked') == true)
                // {
                // if(use_currency){
                //     if (!empty(use_currency)) {
                {{--    if($('#use_currency').attr('checkes')=='true')--}}
                {{--    {--}}

                {{--    // if($('#use_currency').prop('checked')==true) {--}}
                {{--        //     if (this.checked) {--}}
                {{--        // console.log(use_currency);--}}

                {{--        $('.currecny').on('keyup', function (e) {--}}
                {{--            var currency_from_key = $(this).data('key');--}}
                {{--            var price = $(this).val();--}}

                {{--            // console.log(change_currency(currency_from_key,'EGP',price));--}}

                {{--            var divs = document.getElementsByClassName('currecny');--}}

                {{--            console.log(divs);--}}
                {{--            var currency_to_key = '';--}}
                {{--            for (let i = 0; i < divs.length; ++i) {--}}
                {{--                currency_to_key = divs[i].getAttribute('data-key');--}}
                {{--                divs[i].value = change_currency(currency_from_key, currency_to_key, price);--}}
                {{--            }--}}
                {{--        });--}}

                {{--        // }--}}

                {{--        function change_currency(from_currecny, to_cuurency, price) {--}}
                {{--            let CurrencyJson = @json($currecny_json);--}}

                {{--            return Math.round(CurrencyJson[from_currecny][to_cuurency] * price);--}}
                {{--        }--}}
                {{--    }--}}
                {{--    else{--}}
                {{--        console.log($('#use_currency').prop('checked'));--}}
                {{--    }--}}
                {{--}--}}
                // jQuery('input#dollars').change(function () {
                //     var dollars = jQuery('input#dollars').val();
                //
                //     jQuery('input#egyptian').val(16 * dollars);
                //     jQuery('input#riyals').val(0.3 * dollars);
                //     jQuery('input#sudanese').val(426 * dollars);
                // });


                jQuery('input.discount').change(function () {
                    var discount = jQuery('input.discount').val();

                    var price = jQuery('input#prices').val();
                    var selecttype = jQuery('select#selecttype').val();
                    if(selecttype=='Fixed value')

                        jQuery('input#afterdiscount').val(price - discount);


                    else

                        jQuery('input#afterdiscount').val(price-(price*(discount/100)));




                    endif



                });

            </script>

            <script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>

            <script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

            <script type="text/javascript">
                $('.cropme').simpleCropper();
            </script>


            <script type="text/javascript">
                $(document).ready(function () {

                    let html =
                        `<img src="{{ empty($data->photo) ? asset('assets/images/noimage.png') : asset('assets/images/products/'.$data->photo) }}" alt="">`;
                    $(".span4.cropme").html(html);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                });


                $('.ok').on('click', function () {

                    setTimeout(
                        function () {


                            var img = $('#feature_photo').val();

                            $.ajax({
                                url: "{{route('admin-prod-upload-update',$data->id)}}",
                                type: "POST",
                                data: {
                                    "image": img
                                },
                                success: function (data) {
                                    if (data.status) {
                                        $('#feature_photo').val(data.file_name);
                                    }
                                    if ((data.errors)) {
                                        for (var error in data.errors) {
                                            $.notify(data.errors[error], "danger");
                                        }
                                    }
                                }
                            });

                        }, 1000);


                });
            </script>

            <script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
