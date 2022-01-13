@extends('layouts.admin')
@section('title')
    {{ __('site.Posts') }}
@endsection
@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('site.Add New Post') }} <a class="add-btn" href="{{route('admin-blog-index')}}"><i class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('site.Blog') }}</a></li>
                        <li>
                          <a href="{{ route('admin-blog-index') }}">{{ __('site.Posts') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-blog-create') }}">{{ __('site.Add New Post') }}</a>
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
                        @include('includes.admin.form-both')
                      <form  action="{{route('admin-blog-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                          @include('partials._errors')

                          @bsMultilangualFormTabs
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.category') }}*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select  name="category_id" required="">
                                  <option value="">{{ __('Select Category') }}</option>
                                    @foreach($cats as $cat)
                                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.title1') }} *</h4>
{{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                            </div>
                          </div>
                          <div class="col-lg-7">

                              {{ BsForm::text('title')->attribute('class', 'input-field')->placeholder(trans('site.title1')) }}

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
{{--                                  <textarea  class="nic-edit-p" name="details"></textarea>--}}
                                  {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                              </div>
                          </div>

                          @endBsMultilangualFormTabs



                          <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.image') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload">
                                <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                            </div>

                          </div>
                        </div>



                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.Source') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="source" placeholder="{{ __('Source') }}" required="" value="{{ Request::old('source') }}">

                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO">
                              <label for="allowProductSEO">{{ __('Allow Blog SEO') }}</label>
                            </div>

                          </div>
                        </div>

                        <div class="showbox">
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="left-area">
                                  <h4 class="heading">{{ __('site.Meta Tags') }} *</h4>
                              </div>
                            </div>
                            <div class="col-lg-7">
                              <ul id="metatags" class="myTags">
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
                                <textarea class="input-field" name="meta_description" placeholder="{{ __('Meta Description') }}"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.Tags') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <ul id="tags" class="myTags">
                            </ul>
                          </div>
                        </div>

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

@section('scripts')
<script type="text/javascript">

{{-- TAGIT --}}

          $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true
          });

          $("#tags").tagit({
          fieldName: "tags[]",
          allowSpaces: true
        });
{{-- TAGIT ENDS--}}
</script>
@endsection

