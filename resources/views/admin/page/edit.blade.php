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
                          <a href="{{ route('admin-page-index') }}">{{ __('site.pages') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-page-edit',$data->id) }}">{{ __('site.edit') }}</a>
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

                      @include('includes.admin.form-both')
                          {{ BsForm::resource('page')->putModel($data, route('admin-page-update', $data)) }}
                          @include('partials._errors')


{{--                      <form  action="{{route('admin-page-update',$data->id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                        {{csrf_field()}}--}}
                          @bsMultilangualFormTabs

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.title1') }} *</h4>
                                      {{--                                <p class="sub-heading">{{ __('In Any Language') }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-7">

                                  {{ BsForm::text('title')->placeholder(trans('site.title1')) }}
                                  {{--                            <input type="text" class="input-field" name="title" placeholder="{{ __('Title') }}" required="" value="{{ Request::old('title') }}">--}}
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="left-area">
                                      <h4 class="heading">{{ __('site.slug') }} *</h4>
                                      {{--                                <p class="sub-heading">{{ __('(In English)') }}</p>--}}
                                  </div>
                              </div>
                              <div class="col-lg-7">
                                  {{ BsForm::text('slug')->placeholder(trans('site.slug')) }}

                                  {{--                              <input type="text" class="input-field" name="slug" placeholder="{{ __('Slug') }}" required="" value="{{ Request::old('slug') }}">--}}
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
                                  {{--                              <textarea  class="nic-edit-p" name="details" placeholder="{{ __('site.description') }}">{{ Request::old('details') }}</textarea>--}}
                                  {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}
                                  <div class="checkbox-wrapper">
                                      <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO">
                                      <label for="allowProductSEO">{{ __('Allow Page SEO') }}</label>
                                  </div>
                              </div>
                          </div>
                          @endBsMultilangualFormTabs


                          <div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('site.Meta Tags') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <ul id="metatags" class="myTags">
                                @foreach (explode(',',$data->meta_tag) as $element)
                                  <li>{{  $element }}</li>
                                @endforeach
                              </ul>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('site.Meta Description') }} *
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <div class="text-editor">
                                <textarea name="meta_description" class="input-field" placeholder="{{ __('Meta Description') }}">{{ $data->meta_description }}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>
                          </div>
                        </div>
                          {{BsForm::close()}}
{{--                      </form>--}}

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('scripts')
<script type="text/javascript">

{{-- TAGIT --}}

          $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true
          });

{{-- TAGIT ENDS--}}
</script>
@endsection
