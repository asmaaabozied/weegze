@extends('layouts.admin')
@section('title')
    {{ __('site.categories') }}
@endsection
@section('content')

    <div class="content-area">

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            <form action="{{route('admin-cblog-create')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @include('partials._errors')
                                @bsMultilangualFormTabs
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.name') }} *</h4>
                                            {{--																<p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
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
                                            {{--                                <p class="sub-heading">{{ __('In English') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{ BsForm::textarea('description')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                                        {{--                              <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">--}}
                                    </div>
                                </div>

                                @endBsMultilangualFormTabs

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.slug') }} *</h4>
                                            {{--																<p class="sub-heading">{{ __('(In Any English)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <input type="text" class="input-field" name="slug"
                                               placeholder="{{ __('site.slug') }}" required="" value="">
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
