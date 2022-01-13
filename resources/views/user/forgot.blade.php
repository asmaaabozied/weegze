@extends('layouts.front')

@section('content')

<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="pages">
                    <li>
                        <a href="{{ route('front.index') }}">
                            {{ trans('site.dashboard') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-forgot') }}">
                            {{ trans('site.forgot') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="login-signup forgot-password">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-area">
                    <div class="header-area forgot-passwor-area">
{{--                        <h4 class="title">{{ $langg->lang191 }} </h4>--}}
{{--                        <p class="text">{{ $langg->lang192 }} </p>--}}
                    </div>
                    <div class="login-form">
                        @include('includes.admin.form-login')
                        <form  action="{{route('user-forgot-submit')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-input">
                                <input type="email" name="email" class="User Name" placeholder="{{ trans('site.email') }}"
                                    required="">
                                <i class="icofont-user-alt-5"></i>
                            </div>
                            <div class="to-login-page">
                                <a href="{{ route('user.login') }}">
                                    {{trans('site.login')}}
                                </a>
                            </div>
                            <input class="authdata" type="hidden" value="">
                            <button type="submit" class="submit-btn">{{ trans('site.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
