@extends('layouts.admin')
@section('title')
    {{ __('site.Meta Keywords') }}
@endsection
@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('site.Meta Keywords') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('site.SEO Tools') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-seotool-analytics') }}">{{ __('site.Meta Keywords') }}</a>
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
{{--                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>--}}
{{--                        <form  action="{{ route('admin-seotool-analytics-update') }}" method="POST" enctype="multipart/form-data">--}}
{{--                          {{csrf_field()}}--}}
                            {{ BsForm::resource('seotool')->putModel($tool, route('admin-seotool-analytics-update', $tool)) }}

                        @include('includes.admin.form-both')
                          @bsMultilangualFormTabs
                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('site.Meta Keywords') }} *
                                  </h4>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="tawk-area">
{{--                                    <textarea  name="meta_keys">{{ $tool->meta_keys }}</textarea>--}}
                                      {{ BsForm::textarea('meta_keys')->attribute('class', 'nic-edit')->placeholder('site.description') }}

                                  </div>
                              </div>
                            </div>
                          @endBsMultilangualFormTabs

                          <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                          </div>
                        </div>
                      </div>
                 {{BsForm::close()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
