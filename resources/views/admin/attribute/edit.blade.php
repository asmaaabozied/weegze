@extends('layouts.admin')
@section('title')
    {{__('site.edit')}}
@endsection
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h4 class="heading d-inline-block">
                        <span class="text-capitalize"></span> {{__('site.categories')}}
                        <a href="{{ url()->previous() }}" class="add-btn"><i
                                class="fas fa-angle-left"></i> {{__('site.back')}}</a>
                    </h4>
                    <ul class="links d-inline-block">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{__('site.dashboard')}} </a>
                        </li>
                        <li><a href="javascript:;">{{__('site.Manage Attribute')}}</a></li>
                        <li>
                            {{--                <a href="#"><span class="text-capitalize"></span> {{__('site.Attribute')}}</a>--}}
                        </li>
                        <li><a href="javascript:;">{{__('site.edit')}}</a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="py-5" id="app">

                        <div class="add-product-content1">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="gocover"
                                         style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
{{--                                                      <form  action="{{route('admin-attr-update', $attr->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                                                          {{csrf_field()}}--}}
                                    {{ BsForm::resource('attr')->putModel($attr, route('admin-attr-update', $attr->id)) }}

                                    @bsMultilangualFormTabs

                                    @include('includes.admin.form-both')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" style="float: right"><strong>{{__('site.name')}}</strong></label>
                                                <div class="">
                                                    {{ BsForm::text('name')->placeholder(trans('site.name')) }}

                                                    {{--                                   <input type="text" class="input-field" name="name" value="{{$attr->name}}" placeholder="{{__('Enter Name')}}" required>--}}
                                                </div>
                                                {{--                               @if ($errors->has('name'))--}}
                                                {{--                                 <p class="text-danger mb-0">{{$errors->first('name')}}</p>--}}
                                                {{--                               @endif--}}
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="row" id="optionarea">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for=""><strong>{{__('site.Options')}}</strong></label>--}}
{{--                                                <div class="row mb-2 counterrow" v-for="option in options"--}}
{{--                                                     :key="option.id">--}}
{{--                                                    <div class="col-md-11">--}}
{{--                                                        {{ BsForm::text('options[]')->placeholder(trans('site.Options'))->attribute('id','optionfield1') }}--}}

{{--                                                    </div>--}}

{{--                                                    <div class="col-md-1">--}}
{{--                                                        <button type="button" class="btn btn-danger text-white"--}}
{{--                                                                @click="removeExistingOption(option.id)"><i--}}
{{--                                                                class="fa fa-times"></i></button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="row mb-2 counterrow" v-for="n in counter"--}}
{{--                                                     :id="'newOption'+n">--}}
{{--                                                    <div class="col-md-11">--}}
{{--                                                        <input class="input-field optionin" type="text" name="options[]"--}}
{{--                                                               value="" placeholder="{{__('Option label')}}" required>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="col-md-1">--}}
{{--                                                        <button type="button" class="btn btn-danger text-white"--}}
{{--                                                                @click="removeOption(n)"><i class="fa fa-times"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button type="button" class="btn btn-success text-white"--}}
{{--                                                        @click="addOption()"><i--}}
{{--                                                        class="fa fa-plus"></i> {{__('Add Option')}}</button>--}}
{{--                                                @if ($errors->has('options.*') || $errors->has('options'))--}}
{{--                                                    <p class="text-danger mb-0">{{$errors->first('options.*')}}</p>--}}
{{--                                                    <p class="text-danger mb-0">{{$errors->first('options')}}</p>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="row" v-if="counter > 0" id="optionarea">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="row mb-2 counterrow" v-for="n in counter" :id="'counterrow'+n">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __('site.Option') }} *</h4>
                                                            {{--                                 <p class="sub-heading">{{ __('In English') }}</p>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        {{ BsForm::text('options[]')->placeholder(trans('site.Option'))->attribute('id','optionfield1') }}


                                                        {{--                               <input :id="'optionfield'+n" type="text" class="input-field" name="options[]" value="" placeholder="Option label" required>--}}

                                                    </div>
                                                    <div class="col-lg-1">
                                                        <button type="button" class="btn btn-danger text-white" @click="removeOption(n)"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-7 offset-lg-4">
                                                        <button type="button" class="btn btn-success text-white" @click="addOption()"><i class="fa fa-plus"></i> Add Option</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @endBsMultilangualFormTabs


                                    <div class="row">
                                        <div class="col-lg-7 offset-lg-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="priceStatus1" name="price_status" class="custom-control-input" checked value="1">
                                                <label class="custom-control-label" for="priceStatus1">@lang('site.Allow Price Field')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-7 offset-lg-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="detailsStatus1" name="details_status" class="custom-control-input" checked value="1">
                                                <label class="custom-control-label" for="detailsStatus1">@lang('site.Show on Details Page')</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <button class="addProductSubmit-btn btn-success" type="submit">{{ __('site.edit') }}</button>
                                        </div>
                                    </div>

                                    {{BsForm::close()}}            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @section('scripts')
                <script>
                    var app = new Vue({
                        el: '#app',
                        data: {
                            counter: 1
                        },
                        methods: {
                            addOption() {
                                $("#optionarea").addClass('d-block');
                                this.counter++;
                            },
                            removeOption(n) {
                                $("#counterrow"+n).remove();
                                if ($(".counterrow").length == 0) {
                                    this.counter = 0;
                                }
                            }
                        }
                    })
                </script>
@endsection
