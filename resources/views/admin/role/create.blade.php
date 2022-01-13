@extends('layouts.admin')

@section('content')

            <div class="content-area">
                <div class="mr-breadcrumb">
                    <div class="row">
                      <div class="col-lg-12">
                          <h4 class="heading">@lang('site.Add Role')<a class="add-btn" href="{{route('admin-role-index')}}"><i class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                          <ul class="links">
                            <li>
                              <a href="{{ route('admin.dashboard') }}">@lang('site.dashboard') </a>
                            </li>
                            <li>
                              <a href="{{ route('admin-role-index') }}">@lang('site.Manage Roles')</a>
                            </li>
                            <li>
                              <a href="{{ route('admin-role-create') }}">@lang('site.Add Role')</a>
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
                      <form  action="{{route('admin-role-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                      @include('includes.admin.form-both')

                        <div class="row">
                          <div class="col-lg-2">
                            <div class="left-area">
                                <h4 class="heading">@lang('site.name') *</h4>
{{--                                <p class="sub-heading">{{ __("(In Any Language)") }}</p>--}}
                            </div>
                          </div>
                          <div class="col-lg-10">
                            <input type="text" class="input-field" name="name" placeholder="@lang('site.name')" required="" value="">
                          </div>
                        </div>
                          <div class="row">
                              <div class="col-lg-2">
                                  <div class="left-area">
                                      <h4 class="heading">@lang('site.display_name') *</h4>
                                      {{--                                <p class="sub-heading">{{ __("(In Any Language)") }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-10">
                                  <input type="text" class="input-field" name="display_name" placeholder="@lang('site.display_name')" required="" value="">
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-2">
                                  <div class="left-area">
                                      <h4 class="heading">@lang('site.description') *</h4>
                               </div>
                              </div>
                              <div class="col-lg-10">
                                  <textarea name="description" class="form-control" placeholder="@lang('site.description')" ></textarea>
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
                                <input type="checkbox" name="section[]" value="{{ $map . '_' . $model }}">  >
                                <span class="slider round"></span>
                              </label>




                                @endforeach
                            </div>
                            <div class="col-lg-2"></div>

                        </div>
                          @endforeach



{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.Affiliate Products') *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="affilate_products" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.customers') *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="customers">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Vendors & Vendor Verifications') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="vendors" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Vendor Subscription Plans') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="vendor_subscription_plans">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.categories') *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="categories" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Bulk Product Upload') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="bulk_product_upload">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Product Discussion') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="product_discussion" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Set Coupons') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="set_coupons">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Blog') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="blog" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.message')*</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="messages">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.settings') *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="general_settings" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Home Page Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="home_page_settings">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Menu Page Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="menu_page_settings" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Email Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="emails_settings">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Payment Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="payment_settings">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Social Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="social_settings">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Language Settings') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="language_settings" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('SEO Tools') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="seo_tools">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">{{ __('Manage Staffs') }} *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="manage_staffs" >--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-2"></div>--}}
{{--                            <div class="col-lg-4 d-flex justify-content-between">--}}
{{--                              <label class="control-label">@lang('site.Subscribers') *</label>--}}
{{--                              <label class="switch">--}}
{{--                                <input type="checkbox" name="section[]" value="subscribers">--}}
{{--                                <span class="slider round"></span>--}}
{{--                              </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="row">
                          <div class="col-lg-5">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">@lang('site.add')</button>
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
