@extends('layouts.admin')

@section('title')
    {{ __('site.edit') }}
@endsection
@section('content')

            <div class="content-area">

              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('site.edit') }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("site.back") }}</a></h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li>
                          <a href="javascript:;">{{ __('site.Menu Page Settings') }} </a>
                        </li>
                        <li>
                          <a href="{{ route('admin-faq-index') }}">{{ __('site.Faq') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-faq-edit',$data->id) }}">{{ __('site.edit') }}</a>
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

                        <div class="gocover" style="background: url({{asset('assets/images/')}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                          @include('partials._errors')
                      @include('includes.admin.form-both')
                          {{ BsForm::resource('faq')->putModel($data, route('admin-faq-update', $data)) }}

{{--                          <form  action="{{route('admin-faq-update',$data->id)}}" method="POST">--}}
{{--                        {{csrf_field()}}--}}

                          @bsMultilangualFormTabs

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.title1') }} *</h4>
                                      {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::text('title')->placeholder(trans('site.title1')) }}

                                  {{--                              <input type="text" class="input-field" name="title" placeholder="{{ __('site.title1') }}" required="" value="{{ Request::old('title') }}">--}}
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
                                  {{ BsForm::textarea('details')->attribute('class', 'nic-edit')->placeholder('site.description') }}

                                  {{--                              <textarea  class="nic-edit" name="details" placeholder="{{ __('site.description') }}">{{ Request::old('details') }}</textarea>--}}
                              </div>
                          </div>

                          @endBsMultilangualFormTabs




                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                          </div>
                        </div>
{{--                      </form>--}}
                          {{BsForm::close()}}


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
