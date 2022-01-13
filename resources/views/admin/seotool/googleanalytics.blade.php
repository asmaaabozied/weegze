@extends('layouts.admin')
@section('title')
    {{ __('site.Google Analytics') }}
@endsection
@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('site.Google Analytics') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('site.SEO Tools') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-seotool-analytics') }}">{{ __('site.Google Analytics') }}</a>
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
{{--                          .$gs->admin_loader--}}
                        <div class="gocover" style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
{{--                        <form  action="{{ route('admin-seotool-analytics-update') }}" method="POST" enctype="multipart/form-data">--}}
{{--                          {{csrf_field()}}--}}
                          {{ BsForm::resource('seotool')->putModel($tool, route('admin-seotool-analytics-update', $tool)) }}


                          {{--                            {{ BsForm::post('admin-seotool-analytics-update') }}--}}
                        @include('includes.admin.form-both')
                            @bsMultilangualFormTabs

                          <div class="row justify-content-center">
                              <div class="col-lg-3">
                                <div class="left-area">
                                  <h4 class="heading">
                                      {{ __('site.Google Analytics Script') }} *
                                  </h4>
                                </div>
                              </div>

                              <div class="col-lg-6">
                                  <div class="tawk-area">
                                      {{ BsForm::textarea('google_analytics')->attribute('class', 'nic-edit') }}

{{--                                      <textarea  name="google_analytics">{{ $tool->google_analytics }}</textarea>--}}
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
{{--                              {{ BsForm::submit()->label(trans('site.save')) }}--}}
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                          </div>
                        </div>
                      </div>
{{--                     </form>--}}
                        {{ BsForm::close() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
