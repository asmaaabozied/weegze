@extends('layouts.admin')
@section('title')
    {{ __('site.categories') }}
    @lang('site.edit')
@endsection
@section('content')

            <div class="content-area">

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">

                          <div class="row">
                              <div class="col-lg-3">

                                  <h4 class="heading">{{__('site.edit')}} {{ __('site.Main Categories') }} </h4>

                              </div>
                          </div>

                          @include('includes.admin.form-error')

                          {{ BsForm::resource('cat')->putModel($data, route('admin-cat-update', $data)) }}

                          @include('partials._errors')


                          @bsMultilangualFormTabs

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.name') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::text('name')->placeholder(trans('site.name')) }}

                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.description') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::textarea('description')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                              </div>
                          </div>
                          @endBsMultilangualFormTabs

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.slug') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">

                                  {{ BsForm::text('slug')->placeholder(trans('site.slug')) }}
                              </div>
                          </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.icon') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/categories/'.$data->photo):asset('assets/images/noimage.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Icon') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                            </div>

                          </div>
                        </div>




						          </div>



                        <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                              <button class="addProductSubmit-btn breadcrumb btn-primary" type="submit">{{ __('site.save') }}</button>

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
