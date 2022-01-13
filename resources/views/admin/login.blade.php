{{--<!doctype html>--}}
{{--<html lang="en" dir="ltr">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="author" content="GeniusOcean">--}}
{{--    <!-- Title -->--}}
{{--    <title> Login</title>--}}
{{--    <!-- favicon -->--}}
{{--    <link rel="icon"  type="image/x-icon" href="{{asset('assets/images/')}}"/>--}}
{{--<!-- Bootstrap -->--}}
{{--    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet"/>--}}
{{--    <!-- Fontawesome -->--}}
{{--    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">--}}
{{--    <!-- icofont -->--}}
{{--    <link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">--}}
{{--    <!-- Sidemenu Css -->--}}
{{--    <link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet"/>--}}
{{--    <link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet"/>--}}

{{--    <link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet"/>--}}
{{--    <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-coloroicker.css') }}">--}}
{{--    <!-- Main Css -->--}}
{{--    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>--}}
{{--    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>--}}
{{--    <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet"/>--}}
{{--    @yield('styles')--}}

{{--</head>--}}
{{--<body>--}}

{{--<!-- Login and Sign up Area Start -->--}}
{{--<section class="login-signup">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-5">--}}
{{--                <div class="login-area">--}}
{{--                    <div class="header-area">--}}
{{--                        <h4 class="title">{{ __('Login Now') }}</h4>--}}
{{--                        <p class="text">{{ __('Welcome back, please sign in below') }}</p>--}}
{{--                    </div>--}}
{{--                    <div class="login-form">--}}
{{--                        @isset($error)--}}

{{--                            <div class="alert alert-info validation">--}}
{{--                                <p class="text-left">--}}
{{--                                    {{$error}}--}}
{{--                                    --}}{{--                                @include('partials._errors')--}}

{{--                                </p>--}}
{{--                            </div>--}}
{{--                        @endisset--}}
{{--                        <div class="alert alert-success validation" style="display: none;">--}}
{{--                            <button type="button" class="close alert-close"><span>×</span></button>--}}
{{--                            <p class="text-left"></p>--}}
{{--                        </div>--}}
{{--                        <div class="alert alert-danger validation" style="display: none;">--}}
{{--                            <button type="button" class="close alert-close"><span>×</span></button>--}}
{{--                            <p class="text-left"></p>--}}
{{--                        </div>--}}
{{--                            <form   method="POST" action="{{ route('admin.login.submit') }}">--}}

{{--                            {{ csrf_field() }}--}}
{{--                            {{ method_field('post') }}--}}
{{--                            <div class="form-input">--}}
{{--                                <input type="email" name="email" class="User Name"--}}
{{--                                       placeholder="{{ __('Type Email Address') }}" value="" required="" autofocus>--}}
{{--                                <i class="icofont-user-alt-5"></i>--}}
{{--                            </div>--}}
{{--                            <div class="form-input">--}}
{{--                                <input type="password" name="password" class="Password"--}}
{{--                                       placeholder="{{ __('Type Password') }}">--}}
{{--                                <i class="icofont-ui-password"></i>--}}
{{--                            </div>--}}
{{--                            <div class="form-forgot-pass">--}}
{{--                                <div class="left">--}}
{{--                                    <input type="checkbox" name="remember"--}}
{{--                                           id="rp" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                    <label for="rp">{{ __('Remember Password') }}</label>--}}
{{--                                </div>--}}
{{--                                <div class="right">--}}
{{--                                    <a href="">--}}
{{--                                        {{ __('Forgot Password?') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            --}}{{--                            <input id="authdata" type="hidden" value="{{ __('Authenticating...') }}">--}}
{{--                            <button class="submit-btn" type="submit">{{ __('Login') }}</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<!--Login and Sign up Area End -->--}}


{{--<!-- Dashboard Core -->--}}
{{--<script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>--}}
{{--<!-- Fullside-menu Js-->--}}
{{--<script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>--}}

{{--<script src="{{asset('assets/admin/js/plugin.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/js/tag-it.js')}}"></script>--}}
{{--<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>--}}
{{--<script src="{{ asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>--}}
{{--<script src="{{asset('assets/admin/js/load.js')}}"></script>--}}
{{--<!-- Custom Js-->--}}
{{--<script src="{{asset('assets/admin/js/custom.js')}}"></script>--}}
{{--<!-- AJAX Js-->--}}
{{--<script src="{{asset('assets/admin/js/myscript.js')}}"></script>--}}

{{--</body>--}}

{{--</html>--}}
    <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Login</title>
    <link rel="apple-touch-icon" href="{{asset('style/app-assets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('style/app-assets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/css/themes/vertical-dark-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/css/themes/vertical-dark-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/pages/login.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body
    class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column login-bg   blank-page blank-page"
    data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
<div class="row">
    <div class="col s12">
        <div class="container">
            <div id="login-page" class="row">
                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">

{{--                    <form action="{{ route('login') }}" method="post" class="login-form">--}}
                        <form   method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @include('partials._errors')

                            @isset($error)

                                                        <div class="alert alert-info validation">
                                                            <p class="text-left">
                                                                {{$error}}
                                                                                                @include('partials._errors')

                                                            </p>
                                                        </div>
                                                    @endisset
                                                    <div class="alert alert-success validation" style="display: none;">
                                                        <button type="button" class="close alert-close"><span>×</span></button>
                                                        <p class="text-left"></p>
                                                    </div>
                                                    <div class="alert alert-danger validation" style="display: none;">
                                                        <button type="button" class="close alert-close"><span>×</span></button>
                                                        <p class="text-left"></p>
                                                    </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <h5 class="ml-4">Sign in</h5>
                            </div>
                        </div>

                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">person_outline</i>
                                <input id="username" type="email" name="email">
                                <label for="username" class="center-align">Email</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons prefix pt-2">lock_outline</i>
                                <input id="password" type="password" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox" name="remember"/>
                                        <span>Remember Me</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                            <input type="hidden" name="admins" value="admins">

                            <div class="row">
                            <div class="input-field col s12">
                                <button type="submit"
                                        class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
                                    Login
                                </button>
                            </div>
                        </div>

                    </form><!-- end of form -->





                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('style/app-assets/js/vendors.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('style/app-assets/js/plugins.js')}}"></script>
    <script src="{{asset('style/app-assets/js/search.js')}}"></script>
    <script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS--></div>
</body>

</html>

