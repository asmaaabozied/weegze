@extends('layouts.admin')
@section('styles')

    <link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('title')
    {{ __('site.discountss') }}
@endsection
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.edit') }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('site.discountss') }}</a></li>


                    </ul>
                </div>
            </div>
        </div>

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            {{--                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>--}}
                            @include('includes.admin.form-both')
                            {{ BsForm::resource('discounts')->putModel($data, route('admin-discounts-update', $data)) }}

                            {{--                            <form  action="{{route('admin-discounts-store')}}" method="POST" enctype="multipart/form-data">--}}
                            {{--                                {{csrf_field()}}--}}
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

                                    {{ BsForm::text('name')->attribute('class', 'input-field')->placeholder(trans('site.name')) }}

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
                                    {{--                                  <textarea  class="nic-edit-p" name="details"></textarea>--}}
                                    {{ BsForm::textarea('description')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                                </div>
                            </div>

                            @endBsMultilangualFormTabs
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
                                        <h4 class="heading">{{ __('site.type') }} *</h4>
                                        {{--                                      <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <select class="form-control" name="type">
                                        <option value="Percentage" {{$data->type == 'Percentage' ? "selected":""}}>Percentage</option>
                                        <option value="Fixed value" {{$data->type == 'Fixed value' ? "selected":""}}>Fixed value</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.discount') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    {{ BsForm::number('discount')->attribute('class', 'input-field')->placeholder(trans('site.discount')) }}

                                </div>
                            </div>





                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.start_at') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <input type="date" class="input-field" name="start_at"
                                           placeholder="{{ __('Select a date') }}" required="" value="{{$data->start_at}}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.end_at') }} *</h4>
                                    </div>
                                </div>
                                <div class="col-lg-7">

                                    <input type="date" class="input-field" name="end_at"
                                           placeholder="{{ __('Select a date') }}" required="" value="{{$data->end_at}}">
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
                            {{--                            </form>--}}
                            {{BsForm::close()}}
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

