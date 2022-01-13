@extends('layouts.admin')
@section('title')
    {{ __('site.Home Page Customization') }}
@endsection
@section('content')

<div class="content-area">
  <div class="mr-breadcrumb">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="heading">{{ __('site.Home Page Customization') }}</h4>
        <ul class="links">
          <li>
            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
          </li>
          <li>
            <a href="javascript:;">{{ __('site.Home Page Settings') }}</a>
          </li>
          <li>
            <a href="{{ route('admin-ps-customize') }}">{{ __('site.Home Page Customization') }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="add-product-content1">
    <div class="product-description">
    <div class="body-area">
    <div class="row">
      <div class="col-lg-12">


            <div class="gocover"
              style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
            </div>
            <form action="{{ route('admin-ps-homeupdate') }}" method="POST"
              enctype="multipart/form-data">
              {{ csrf_field() }}

              @include('includes.admin.form-both')


              <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="slider">{{ __('site.sliders') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="slider" value="1" {{$data->slider==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="featured_category">{{ __('site.category') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="featured_category" value="1" {{$data->featured_category==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="featured">{{ __('site.Featured') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="featured" value="1" {{$data->featured==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="small_banner">{{ __('site.Top Small Banner') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="small_banner" value="1" {{$data->small_banner==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="best">{{ __('site.Best Seller') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="best" value="1" {{$data->best==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>

                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="flash_deal">{{ __('Flash Deal') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="flash_deal" value="1" {{$data->flash_deal==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>



              <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="large_banner">{{ __('site.Large Banner') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="large_banner" value="1" {{$data->large_banner==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>

                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="top_rated">{{ __('site.Top Rated') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="top_rated" value="1" {{$data->top_rated==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>

              </div>

              <div class="row justify-content-center">
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="bottom_small">{{ __('site.Bottom Small Banner') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="bottom_small" value="1" {{$data->bottom_small == 1 ? "checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>

                <div class="col-lg-2"></div>
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="big">{{ __('site.Big Save') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="big" value="1" {{$data->big==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>

              </div>


              <div class="row justify-content-center">


                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="hot_sale">{{ __('Hot, New, Trending & Sale') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="hot_sale" value="1" {{$data->hot_sale==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="review_blog">{{ __('Review & Blog') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="review_blog" value="1" {{$data->review_blog==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>

              </div>

              <div class="row justify-content-center">

                <div class="col-lg-4 d-flex justify-content-between">
                  <label class="control-label" for="partners">{{ __('site.Partners') }} *</label>
                  <label class="switch">
                    <input type="checkbox" name="partners" value="1" {{$data->partners==1?"checked":""}}>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4 d-flex justify-content-between">
                    <label class="control-label" for="service">{{ __('site.services') }} *</label>
                    <label class="switch">
                      <input type="checkbox" name="service" value="1" {{$data->service==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>

                </div>

              </div>

              <br>

              <div class="row justify-content-center">
                <div class="col-lg-3">
                  <div class="left-area">

                  </div>
                </div>
                <div class="col-lg-6">
                  <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                </div>
              </div>

            </form>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
