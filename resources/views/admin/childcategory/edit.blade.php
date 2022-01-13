@extends('layouts.admin')
@section('title')
    {{ __('site.category') }}
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
{{--                      <form id="geniusformdata" action="{{route('admin-childcat-update',$data->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                        {{csrf_field()}}--}}
                          {{ BsForm::resource('childcat')->putModel($data, route('admin-childcat-update', $data)) }}
                          @include('partials._errors')


                          @bsMultilangualFormTabs

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.name') }} *</h4>
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
                                <h4 class="heading">{{ __('site.category') }}*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select id="cat" required="">
                                  <option value="">{{ __('site.Select Category') }}</option>
                                    @foreach($cats as $cat)
                                      <option data-href="{{ route('admin-subcat-load',$cat->id) }}" value="{{ $cat->id }}" {{ $cat->id == $data->subcategory->category->id ? "selected":"" }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.Sub Category') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select id="subcat"  name="subcategory_id" required="">
                                <option value="">{{ __('Select Sub Category') }}</option>
                                @foreach($data->subcategory->category->subs as $sub)
                                  <option value="{{$sub->id}}" {{$sub->id == $data->subcategory->id ? "selected":""}}>{{$sub->name}}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>

{{--                        <div class="row">--}}
{{--                          <div class="col-lg-4">--}}
{{--                            <div class="left-area">--}}
{{--                                <h4 class="heading">{{ __('Name') }} *</h4>--}}
{{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="col-lg-7">--}}
{{--                            <input type="text" class="input-field" name="name" placeholder="{{ __('Enter Name') }}" required="" value="{{$data->name}}">--}}
{{--                          </div>--}}
{{--                        </div>--}}


                        <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                          </div>
                        </div>
                          {{BsForm::close()}}
{{--                      </form>--}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
