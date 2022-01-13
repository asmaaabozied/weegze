@extends('layouts.admin')
@section('title')
    {{ __('site.countries') }}
@endsection

@section('content')

            <div class="content-area">

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')
                      <form  action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
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
                                      <h4 class="heading">{{ __('site.code') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::text('code') }}

                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.currencies') }} *</h4>
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  <select id="currency_id" required="" name="currency_id" >
                                      <option value="">{{ __('site.select') }}</option>
                                      @foreach(\App\Models\Currency::get() as $cat)
                                          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>




                          <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.add') }}</button>
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
