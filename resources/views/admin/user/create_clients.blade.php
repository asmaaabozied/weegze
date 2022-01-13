@extends('layouts.admin')
@section('title')
    {{ __("site.users") }}
@endsection
@section('content')

    <div class="content-area">
        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('includes.admin.form-error')
                            @include('partials._errors')

                            <form action="{{ route('admin-clients-store') }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("site.users") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("site.image") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview"
                                              >

                                                <label for="image-upload" class="img-label" id="image-label"><i
                                                        class="icofont-upload-alt"></i>{{ __("Upload Image") }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                            </div>
                                            <p class="text">{{ __("Prefered Size: (600x600) or Square Sized Image") }}</p>
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.name") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="name" placeholder="{{ __("site.name") }}"
                                       required="">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.email") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="email" class="input-field" name="email"
                                       placeholder="{{ __("site.email") }} " required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.phone") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="phone" placeholder="{{ __("site.phone") }}"
                                       required="">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.password") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="password" class="input-field" name="password" placeholder="{{ __("site.password") }}"
                                       required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.password_confirmation") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="password" class="input-field" name="password_confirmation" placeholder="{{ __("site.password_confirmation") }}"
                                       required="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.address") }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="address"
                                       placeholder="{{ __("site.address") }}" required="">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.city") }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="phone" placeholder="{{ __("site.city") }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.Fax") }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="fax" placeholder="{{ __("site.Fax") }}">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading">{{ __("site.code") }} </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="input-field" name="zip" placeholder="{{ __("site.code") }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">
                                    <h4 class="heading"> @lang('site.roles')
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-7">

                            <select name="roles[]" class="form-control select2"
                                    multiple>
                            <!-- <option value="">@lang('site.all_roles')</option> -->
                                @foreach (\App\Role::get() as $role)
                                    <option
                                        value="{{ $role->id }}" >
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="left-area">

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <button class="addProductSubmit-btn btn btn-primary" type="submit">{{ __('site.add') }}</button>
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
