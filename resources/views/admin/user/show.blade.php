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

                            <form action="{{ route('admin-user-edit',$data->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading"> {{ __("site.edit") }} {{ __("site.users") }}*</h4>
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
                                                @if($data->is_provider == 1)
                                                    <div id="image-preview" class="img-preview"
                                                         style="background: url({{ $data->photo ? asset($data->photo):asset('assets/images/noimage.png') }});">
                                                        @else
                                                            <div id="image-preview" class="img-preview"
                                                                 style="background: url({{ $data->photo ? asset('assets/images/users/'.$data->photo):asset('assets/images/noimage.png') }});">
                                                                @endif
                                                                @if($data->is_provider != 1)
                                                                    <label for="image-upload" class="img-label"
                                                                           id="image-label"><i
                                                                            class="icofont-upload-alt"></i>{{ __("Upload Image") }}
                                                                    </label>
                                                                    <input type="file" name="photo" class="img-upload"
                                                                           id="image-upload">
                                                                @endif
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
                                            <input type="text" class="input-field" name="name"
                                                   placeholder="{{ __("site.name") }}" required=""
                                                   value="{{ $data->name }}">
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
                                                   placeholder="{{ __("site.email") }}" value="{{ $data->email }}"
                                                   required="" onkeypress="CheckSpace(event)">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">

                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.phone") }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="phone"
                                                   placeholder="{{ __("site.phone")}}" required=""
                                                   value="{{ $data->phone }}" onkeypress="CheckSpace(event)">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.password") }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="password" class="input-field" name="password"
                                                   placeholder="{{ __("site.password") }}"
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
                                            <input type="password" class="input-field" name="password_confirmation"
                                                   placeholder="{{ __("site.password_confirmation") }}"
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
                                                   placeholder="{{ __("site.address") }}" required=""
                                                   value="{{ $data->address }}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.city") }} </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="city"
                                                   placeholder="{{ __("site.city") }}" value="{{ $data->phone }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.Fax") }} </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" class="input-field" name="fax"
                                                   placeholder="{{ __("site.Fax") }}" value="{{ $data->fax }}">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __("site.code") }} </h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="number" class="input-field" name="zip"
                                                   onkeypress="CheckSpace(event)"  placeholder="{{ __("site.code") }}" value="{{ $data->zip }}" required>
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

                                            <select name="roles[]"
                                                    class="js-example-placeholder-multiple js-states form-control select2"
                                                    multiple="multiple" required>
                                            <!-- <option value="">@lang('site.all_roles')</option> -->
                                                @foreach (\App\Role::get() as $role)
                                                    <option
                                                        value="{{ $role->id }}" {{ $data->hasRole($role->name) ? 'selected' : '' }} >
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <br>
                                        <div class="col-lg-4">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-7">

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

    <script>

        $(".js-example-placeholder-multiple").select2({
            placeholder: "{{ __('site.select') }}"
        });


    </script>
    <script type="text/javascript">

        function CheckSpace(event)
        {
            if(event.which ==32)
            {
                event.preventDefault();
                return false;
            }
        }
    </script>
@endsection

