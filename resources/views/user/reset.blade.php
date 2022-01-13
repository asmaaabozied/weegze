@extends('layouts.front')
@section('content')

<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
                <div class="col-lg-8">
                    <div class="user-profile-details">
                        <div class="account-info">
                            <div class="header-area">
                                <h4 class="title">
                                    {{ trans('site.reset') }}
                                </h4>
                            </div>
                            <div class="edit-info-area">
                                @include('partials._errors')
                                @isset($data)
                                <div class="alert alert-danger">
                                        <p>{{ $data }}</p>

                                </div>
                                @endisset
                                <div class="body">
                                        <div class="edit-info-area-form">
                                                <div class="gocover" style="background: url({{ asset('assets/images/') }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                                <form  action="{{route('user-reset-submit')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    @include('includes.admin.form-both')
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                                <input type="password" name="cpass"  class="input-field" placeholder="{{trans('site.password') }}" value="" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                                <input type="password" name="newpass"  class="input-field" placeholder="{{ trans('site.newpassword') }}" value="" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                                <input type="password" name="renewpass"  class="input-field" placeholder="{{ trans('site.password_confirmation') }}" value="" required="">
                                                        </div>
                                                    </div>

                                                        <div class="form-links">
                                                            <button class="submit-btn" type="submit">{{ trans('site.submit') }}</button>
                                                        </div>
                                                </form>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
    </div>
  </section>

@endsection
