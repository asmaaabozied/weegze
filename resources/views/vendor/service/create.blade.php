@extends('layouts.vendor')
@section('title')
    {{trans('site.services')}}
@endsection
@section('content')

            <div class="content-area">

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form  action="{{route('vendor-service-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{trans('site.services')}}*</h4>
                                <br>
                                <p class="sub-heading">{{trans('site.title1')}}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <br>
                            <input type="text" class="input-field" name="title" placeholder="{{ trans('site.title1') }}" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ trans('site.image') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/vendor/images/upload.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ trans('site.image') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
{{--                                  <p class="text">ngg->lang513 }}</p>--}}
                            </div>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                  {{ trans('site.descrption')}} *
                                  <p class="sub-heading"> {{ trans('site.descrption')}}</p>
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="input-field" name="details" placeholder=" {{ trans('site.descrption')}}"></textarea>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit"> {{ trans('site.submit')}}</button>
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
