@extends('layouts.admin')
@section('title')
    @lang('site.Physical Product')
@endsection
@section('styles')

    <link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>

@endsection
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">@lang('site.Physical Product') <a class="add-btn"
                                                                          href="{{ route('admin-prod-types') }}"><i
                                class="fas fa-arrow-left"></i> @lang('site.back')</a>
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">@lang('site.dashboard') </a>
                        </li>
                        <li>
                            <a href="javascript:;">@lang('site.products') </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-index') }}">@lang('site.All Products')</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-types') }}">@lang('site.Add Product')</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-prod-physical-create') }}">@lang('site.Physical Product')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <form action="{{route('admin-prod-store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('partials._errors')
            <div class="row">
                <div class="col-lg-8">
                    <div class="add-product-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-description">
                                    <div class="body-area">

                                        <div class="gocover"
                                             style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                        </div>

                                        @include('includes.admin.form-both')
                                        @bsMultilangualFormTabs
                                        <div class="row">
                                            <div class="col-lg-12">


                                                {{ BsForm::text('name')->label(trans('site.name'))}}

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="text-editor">

                                                    {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->label(trans('site.description')) }}
                                                    {{--                                            <textarea class="nic-edit-p" name="details"></textarea>--}}
                                                </div>
                                            </div>
                                        </div>



                                        @endBsMultilangualFormTabs



                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">@lang('site.category')*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <select id="cat" name="category_id" required="">
                                                    <option value="">@lang('site.Select Category')</option>
                                                    @foreach($cats as $cat)
                                                        <option data-href="{{ route('admin-subcat-load',$cat->id) }}"
                                                                value="{{ $cat->id }}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


{{--                                        <div class="row">--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="left-area">--}}
{{--                                                    <h4 class="heading">@lang('site.taxes')*</h4>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <select id="tax_id" name="tax_id">--}}
{{--                                                    <option value="">@lang('site.select')</option>--}}
{{--                                                    @foreach(\App\Models\Tax::get() as $cat)--}}
{{--                                                        <option value="{{ $cat->id }}">{{$cat->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">@lang('site.Sub Category')*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <select id="subcat" name="subcategory_id">
                                                    <option value="">@lang('site.Select Sub Category')</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">@lang('site.Child Category')*</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <select id="childcat" name="childcategory_id">
                                                    <option value="">@lang('site.Select Child Category')</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">@lang('site.image') *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="panel panel-body">
                                                    <div class="span4 cropme text-center" id="landscape"
                                                         style="width: 100%; height: 285px; border: 1px dashed #ddd; background: #f1f1f1;">
                                                        <a href="javascript:;" id="crop-image" class=" mybtn1" style="">
                                                            <i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <button class="addProductSubmit-btn"
                                                        type="submit">@lang('site.add')</button>
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


                                        <input type="hidden" id="feature_photo" name="photo" value="">

                                        <input type="file" name="gallery[]" class="hidden" id="uploadgallery"
                                               accept="image/*"
                                               multiple>



                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">
                                                        @lang('site.Product Current Price')*
                                                    </h4>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input name="price" type="number" class="input-field"
                                                       placeholder="{{ __('e.g 20') }}" step="0.01" required="" min="0"
                                                       id="prices">
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

                                                {{ BsForm::text('discount')->attribute('class', 'input-field discount')->placeholder(trans('site.discount')) }}

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="left-area">
                                                    <h4 class="heading">@lang('site.Productdiscount')*</h4>
                                                    {{--                                            <p class="sub-heading">@lang('site.Optional')</p>--}}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <input name="previous_price" step="0.01" type="text"
                                                       class="input-field"
                                                       placeholder="" min="0" id="afterdiscount">
                                            </div>
                                        </div>



                                        <input type="hidden" name="type" value="Physical">


                                        <label for="">{{trans('site.USe Currency')}}</label>

                                        <input type="checkbox" name="use_currency" id="use_currency" value="1"
                                               onclick="show_checked()" checkes="false">

                                        @foreach(\App\Models\Currency::get() as $currency)
                                            <input type="hidden" name="currency_id[]" value="{{$currency->id}}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="left-area">
                                                        <h4 class="heading">{{trans('site.price')}}{{$currency->name}}</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="currency[]" id="{{$currency->key}}"
                                                           data-value="{{$currency->value}}"
                                                           class="form-control currecny" data-key="{{$currency->key}}"
                                                           onkeyup="Checkedkeyed(this)">
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
                                                    <input type="checkbox" name="status" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">@lang('site.image')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="top-area">
                        <div class="row">
                            <div class="col-sm-6 text-right">
                                <div class="upload-img-btn">
                                    <label for="image-upload" id="prod_gallery"><i
                                            class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i
                                        class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center">(
                                <small>{{ __('You can upload multiple Images.') }}</small>
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

        function Checkedkeyed(data) {

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


            } else if ($('#use_currency').attr('checkes') == 'true') {

                $('input[name="use_currency"]').attr('checkes', 'false');

            }


            if ($('#use_currency').attr('checkes') == 'true') {

                Checkedkeyed();

                // alert($('#use_currency').attr('checkes'));

            } else if ($('#use_currency').attr('checkes') == 'false') {

                console.log('error');


                // }

            }
        }


        jQuery('input.discount').change(function () {
            var discount = jQuery('input.discount').val();

            var price = jQuery('input#prices').val();
            var selecttype = jQuery('select#selecttype').val();
            if (selecttype == 'Fixed value')

                jQuery('input#afterdiscount').val(price - discount);


            else

                jQuery('input#afterdiscount').val(price - (price * (discount / 100)));


            endif


        });

    </script>

    <script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

    <script type="text/javascript">
        // Gallery Section Insert

        $(document).on('click', '.remove-img', function () {
            var id = $(this).find('input[type=hidden]').val();
            $('#galval' + id).remove();
            $(this).parent().parent().remove();
        });

        $(document).on('click', '#prod_gallery', function () {
            $('#uploadgallery').click();
            $('.selected-image .row').html('');
            $('#geniusform').find('.removegal').val(0);
        });


        $("#uploadgallery").change(function () {
            var total_file = document.getElementById("uploadgallery").files.length;
            for (var i = 0; i < total_file; i++) {
                $('.selected-image .row').append('<div class="col-sm-6">' +
                    '<div class="img gallery-img">' +
                    '<span class="remove-img"><i class="fas fa-times"></i>' +
                    '<input type="hidden" value="' + i + '">' +
                    '</span>' +
                    '<a href="' + URL.createObjectURL(event.target.files[i]) + '" target="_blank">' +
                    '<img src="' + URL.createObjectURL(event.target.files[i]) + '" alt="gallery image">' +
                    '</a>' +
                    '</div>' +
                    '</div> '
                );
                $('#geniusform').append('<input type="hidden" name="galval[]" id="galval' + i +
                    '" class="removegal" value="' + i + '">')
            }

        });

        // Gallery Section Insert Ends
    </script>

    <script type="text/javascript">
        $('.cropme').simpleCropper();
    </script>


    <script src="{{asset('assets/admin/js/product.js')}}"></script>
@endsection
