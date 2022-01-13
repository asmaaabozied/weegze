@extends('layouts.admin')
@section('title')
    {{ __("site.Vendor Subscription Plans") }}
@endsection

@section('content')

            <div class="content-area">

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form  action="{{route('admin-subscription-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                          @include('partials._errors')
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

                                  {{--                              <input type="text" class="input-field" name="name" placeholder="{{ __('site.name') }}" required="" value="">--}}
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.details') }} *</h4>
                                      {{--                                <p class="sub-heading">{{ __('In English') }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->placeholder('site.details') }}

                                  {{--                              <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">--}}
                              </div>
                          </div>
                          @endBsMultilangualFormTabs
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.Currency Symbol") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency" placeholder="{{ __("site.Currency Symbol") }}" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.code") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency_code" placeholder="{{ __("site.code") }}" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.cost") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="price" placeholder="{{ __("site.cost") }}" required="" value="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.Days") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="valueday" placeholder="{{ __("site.Days") }}" required="" >
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("site.Product Limitations") }}*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select id="limit" name="limit" required="">
                                  <option value="">{{ __("site.select") }}</option>
                                  <option value="0">{{ __("Unlimited") }}</option>
                                  <option value="1">{{ __("Limited") }}</option>
                              </select>
                          </div>
                        </div>

                        <div class="showbox" id="limits">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __("Allowed Products") }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <input type="number" min="1" class="input-field" id="allowed_products" name="allowed_products" placeholder="{{ __("Enter Allowed Products") }}" value="1">
                            </div>
                          </div>
                        </div>

{{--                        <div class="row">--}}
{{--                          <div class="col-lg-4">--}}
{{--                            <div class="left-area">--}}
{{--                              <h4 class="heading">--}}
{{--                                   {{ __("site.details") }} *--}}
{{--                              </h4>--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="col-lg-7">--}}
{{--                              <textarea class="nic-edit" name="details" placeholder="{{ __("site.details") }}"></textarea>--}}
{{--                          </div>--}}
{{--                        </div>--}}


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __("site.add") }}</button>
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

@section('scripts')
<script type="text/javascript">

$("#limit").on('change',function() {
  val = $(this).val();
    if(val == 1) {
        $("#limits").show();
        $("#allowed_products").prop("required", true);
    }
    else
    {
        $("#limits").hide();
        $("#allowed_products").prop("required", false);

    }
});

</script>
@endsection

