@extends('layouts.admin')
@section('title')
    {{ __('site.edit') }}
@endsection
@section('content')
            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('site.edit') }} <a class="add-btn" href="{{route('admin-blog-index')}}"><i class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('site.Blog') }}</a></li>
                        <li>
                          <a href="{{ route('admin-blog-index') }}">{{ __('site.Posts') }}</a>
                        </li>
                        <li>
                          <a href="{{ route('admin-blog-edit',$data->id) }}">{{ __('site.edit') }}</a>
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
                      <form  action="{{route('admin-blog-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

{{--                          {{ BsForm::resource('blog')->putModel($data, route('admin-blog-update', $data)) }}--}}
                          @include('partials._errors')


                          @bsMultilangualFormTabs

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('site.category') }}*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select name="category_id" required="">
                                  <option value="">{{ __('Select Category') }}</option>
                                    @foreach($cats as $cat)
                                      <option value="{{ $cat->id }}" {{ $data->category_id == $cat->id ? 'selected' :'' }}>{{ $cat->name }}</option>
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

                                  {{ BsForm::text('title')->attribute('class', 'input-field')->placeholder(trans('site.title1'))->value($data->title) }}

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
                                  {{ BsForm::textarea('details')->attribute('class', 'nic-edit-p')->placeholder('site.description')->value($data->details) }}

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
                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/blogs/'.$data->photo):asset('assets/images/noimage.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
{{--                                    {{ BsForm::file('photo')->attribute('class','img-upload','id','image-upload')}}--}}
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
                            <input type="text" class="input-field" name="source" placeholder="{{ __('site.Source') }}" required="" value="{{$data->source}}">

                            <div class="checkbox-wrapper">
                              <input type="checkbox" name="secheck" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
                              <label for="allowProductSEO">{{ __('Allow Blog SEO') }}</label>
                            </div>

                          </div>
                        </div>

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
                                <textarea class="input-field"  name="meta_description" placeholder="{{ __('site.Meta Description') }}">{{ $data->meta_description }}</textarea>
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
                                @foreach (explode(',',$data->tags) as $element)
                                  <li>{{  $element }}</li>
                                @endforeach
                            </ul>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">

                            </div>
                          </div>
                          <div class="col-lg-7">
{{--                            <button class="addProductSubmit-btn" type="submit">{{ __('site.save') }}</button>--}}
                              {{ BsForm::submit()->label(trans('site.save')) }}

                          </div>
                        </div>
{{--                      </form>--}}
                          {{ BsForm::close() }}


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
