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
                            <li>
                              <a href="{{ route('admin-role-edit',$data->id) }}">{{ __('site.edit') }}</a>
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
                      <form  action="{{route('admin-role-update',$data->id)}}" method="POST" enctype="multipart/form-data">
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
                          <hr>
                          <h5 class="text-center"> @lang('site.permissions')</h5>
                          <hr>


                          @foreach ($models as $index=>$model)
                              <div class="row justify-content-center">
                                  <div class="col-lg-9 d-flex justify-content-between">
                                      <label class="control-label">@lang('site.' . $model) *</label>
                                      @foreach ($maps as $map)
                                          @lang('site.' . $map)
                                          <label class="switch">
                                              <input type="checkbox" name="section[]" value="{{ $map . '_' . $model }}"
                                                     {{ $data->hasPermission($map . '_' . $model) ? 'checked' : '' }} value="{{ $map . '_' . $model }}"
                                              >
                                              <span class="slider round"></span>
                                          </label>




                                      @endforeach
                                  </div>
                                  <div class="col-lg-2"></div>

                              </div>
                          @endforeach
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
