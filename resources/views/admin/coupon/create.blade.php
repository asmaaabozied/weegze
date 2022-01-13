@extends('layouts.admin')
@section('styles')

    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('title')
    {{ __('site.Add New Coupon') }}
@endsection

@section('content')

    <div class="content-area">

        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.Add New Coupon') }} <a class="add-btn"
                                                                           href="{{route('admin-coupon-index')}}"><i
                                class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-coupon-index') }}">{{ __('site.Coupons') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-coupon-create') }}">{{ __('site.Add New Coupon') }}</a>
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
                            @include('partials._errors')
                            <form action="{{route('admin-coupon-create')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.name') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="name"
                                               placeholder="{{ __('site.name') }}" required="" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.code') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="code"
                                               placeholder="{{ __('site.code') }}" required="" onkeypress="CheckSpace(event)">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.UserperCoupon') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="value"
                                               placeholder="{{ __('site.UserperCoupon') }}" required="" onkeypress="CheckSpace(event)">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.UserperCustomer') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="number"
                                               placeholder="{{ __('site.UserperCustomer') }}" required="" onkeypress="CheckSpace(event)">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.products') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="sup_name" required="" name="product_id[]" multiple="multiple" class="js-example-placeholder-multiple js-states form-control">
                                            <option value="">{{ __('site.select') }}</option>
                                            @foreach(\App\Models\Product::get() as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.categories') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        <select class="form-control" name="category_id" required>
                                            @foreach(\App\Models\Category::get()->pluck('name','id') as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.type') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="type" name="type" required="">
                                            <option value="">{{ __('Choose a type') }}</option>
                                            <option value="0">{{ __('Discount By Percentage') }}</option>
                                            <option value="1">{{ __('Discount By Amount') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row hidden">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading"></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" class="input-field less-width" name="price" placeholder=""
                                               required="" value=""><span></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.quantity') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <select id="times" required="">
                                            <option value="0">{{ __('Unlimited') }}</option>
                                            <option value="1">{{ __('Limited') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row hidden">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.value') }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field less-width" name="times"
                                               placeholder="{{ __('Enter Value') }}" value=""><span></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.Start Date') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="date" class="input-field" name="start_date"
                                               placeholder="{{ __('Select a date') }}" required="" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.End Date') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="date" class="input-field" name="end_date"
                                               placeholder="{{ __('Select a date') }}" required="" value="">
                                    </div>
                                </div>

                                <br>
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

@section('scripts')
    <script>

        $(".js-example-placeholder-multiple").select2({
            placeholder: "{{ __('site.select') }}"
        });


    </script>
    <script type="text/javascript">

        function CheckSpace(event)
        {
            if(event.which ==32)
            {
                event.preventDefault();
                return false;
            }
        }
    </script>

    <script type="text/javascript">

        {{-- Coupon Type --}}

        $('#type').on('change', function () {
            var val = $(this).val();
            var selector = $(this).parent().parent().next();
            if (val == "") {
                selector.hide();
            } else {
                if (val == 0) {
                    selector.find('.heading').html('{{ __('site.Percentage') }} *');
                    selector.find('input').attr("placeholder", "{{ __('Enter Percentage') }}").next().html('%');
                    selector.css('display', 'flex');
                } else if (val == 1) {
                    selector.find('.heading').html('{{ __('site.amount') }} *');
                    selector.find('input').attr("placeholder", "{{ __('Enter Amount') }}").next().html('$');
                    selector.css('display', 'flex');
                }
            }
        });


        {{-- Coupon Qty --}}

        $(document).on("change", "#times", function () {
            var val = $(this).val();
            var selector = $(this).parent().parent().next();
            if (val == 1) {
                selector.css('display', 'flex');
            } else {
                selector.find('input').val("");
                selector.hide();
            }
        });

    </script>

    <script type="text/javascript">
        var dateToday = new Date();
        var dates = $("#from,#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            minDate: dateToday,
            onSelect: function (selectedDate) {
                var option = this.id == "from" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            }
        });
    </script>

@endsection

