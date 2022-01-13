@extends('layouts.admin')
@section('title')
    {{ __('site.edit') }}
@endsection
@section('content')
            <div class="content-area">
                <div class="mr-breadcrumb">
                    <div class="row">
                      <div class="col-lg-12">
                          <h4 class="heading">{{ __('site.edit') }} <a class="add-btn" href="{{route('admin-role-index')}}"><i class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                          <ul class="links">
                            <li>
                              <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                            </li>
                            <li>
                              <a href="{{ route('admin-role-index') }}">{{ __('site.Manage Roles') }}</a>
                            </li>
{{--                            <li>--}}
{{--                              <a href="{{ route('admin-role-edit',$data->id) }}">{{ __('site.edit') }}</a>--}}
{{--                            </li>--}}
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
                      <form  action="{{route('admin-permissions-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                          @include('includes.admin.form-both')

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.name") }} *</h4>
{{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name" placeholder="{{ __('site.name') }}" value="{{$data->name}}" required="">
                          </div>
                        </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __("site.display_name") }} *</h4>
                                      {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <input type="text" class="input-field" name="display_name" placeholder="{{ __('site.display_name') }}" value="{{$data->display_name}}" required="">
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">@lang('site.description') *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <textarea name="description" class="form-control" placeholder="@lang('site.description')" >{{$data->description}}</textarea>
                                  {{--                                  <input type="text" class="input-field" name="name" placeholder="@lang('site.name')" required="" value="">--}}
                              </div>
                          </div>



                        <div class="row">
                          <div class="col-lg-5">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
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

@endsection
