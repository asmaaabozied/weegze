@extends('layouts.vendor')
@section('title')
   {{trans('site.social')}}
@endsection
@section('content')

<div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading"> {{trans('site.social')}}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('vendor-dashboard') }}"> {{trans('site.vendor-dashboard')}} </a>
                      </li>
                      <li>
                        <a href="javascript:;"> {{trans('site.social')}}</a>
                      </li>
                      <li>
                        <a href="{{ route('vendor-social-index') }}"> {{trans('site.social')}}</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="add-product-content1">
              <div class="product-description">
              <div class="body-area">
            <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <form  class="form-horizontal" action="{{ route('vendor-social-update') }}" method="POST">
              {{ csrf_field() }}

              @include('includes.admin.form-both')

                <div class="row">
                  <label class="control-label col-sm-3" for="facebook">{{ trans('site.facebook') }} *</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="f_url" id="facebook" placeholder="{{ trans('site.facebook') }}" required="" type="text" value="{{$data->f_url}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="f_check" value="1" {{$data->f_check==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="gplus">{{ trans('site.url') }} *</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="g_url" id="gplus" placeholder="{{ trans('site.url') }}" required="" type="text" value="{{$data->g_url}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="g_check" value="1" {{$data->g_check==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="twitter">{{ trans('site.twitter') }} *</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="t_url" id="twitter" placeholder="{{ trans('site.twitter') }}" required="" type="text" value="{{$data->t_url}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="t_check" value="1" {{$data->t_check==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <label class="control-label col-sm-3" for="linkedin">{{ trans('site.linkedin') }} *</label>
                  <div class="col-sm-6">
                    <input class="form-control" name="l_url" id="linkedin" placeholder="{{ trans('site.linkedin') }}" required="" type="text" value="{{$data->l_url}}">
                  </div>
                  <div class="col-sm-3">
                    <label class="switch">
                      <input type="checkbox" name="l_check" value="1" {{$data->l_check==1?"checked":""}}>
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>


                <div class="row justify-content-center">
                  <div class="col-lg-3">
                    <div class="left-area">

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <button class="addProductSubmit-btn" type="submit">{{ trans('site.submit') }}</button>
                  </div>
                </div>


              </form>
              </div>
            </div>
          </div>

@endsection
