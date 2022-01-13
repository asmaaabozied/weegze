<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="GeniusOcean">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- favicon -->
<!-- Bootstrap -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.css')}}">
    <!-- icofont -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/icofont.min.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
          rel="stylesheet">
    <!-- Sidemenu Css -->
    <link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/admin/css/plugin.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-coloroicker.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('style/app-assets/vendors/data-tables/css/dataTables.checkboxes.css')}}">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- stylesheet -->
    @if(app()->getLocale()=='ar')

        <link href="{{asset('assets/admin/css/rtl/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/rtl/custom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/rtl/responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet"/>
        <style>
            /*rtl*/
            .dataTables_wrapper .dataTables_length {
                float: right;
            }

            .page .header .menu-toggle-button .nav-link {
                right: 316px;
                left: auto;
            }

            span#order-notf-clear {
                left: 0;
                right: auto;


            }
            .mr-breadcrumb .add-btn {
            float: left;
        }

         @media (max-width: 768px) {
            #sidebar.active {
    margin-right: 70px;
}
#sidebar {
    margin-right: -246px;
    margin-left: 0;
    background-color: #8b1014;
}
.header .right-eliment .list li .dropdown-menu {
    left: -45px !important;
}

.header .right-eliment .list li .dropdown-menu {
    left: -137%;}

        }
        @media (max-width: 1199px){
#sidebar.active {
    margin-right: -240px;
    margin-left:0;
}}

        #sidebar {
    z-index: 96;}
    @media (max-width: 768px){
#sidebar.active {
    margin-right: 70px !important;
}}


span#order-notf-clear, span#user-notf-clear{
    left: 0;
                right: auto;

}
        </style>

    @else

        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet"/>
        <style>
            .page .header .menu-toggle-button .nav-link {

                left: 315px;
            }

            span#order-notf-clear, span#user-notf-clear {
                left: auto;
                right: 0;


            }
            .mr-breadcrumb .add-btn {
            float: right;
        }
          @media (max-width: 768px) {
      .header .right-eliment .list li .dropdown-menu {
    left: -60px;
}
.dropdown-menu.lang-dropdown {
    right: 0;
    left: -15px !important;
}}
        </style>

    @endif

    @yield('styles')
    <style>
        /*.canvasjs-chart-toolbar button{*/
        /*        background-color: #0d014f !important;*/

        /*}*/
        span#order-notf-clear,span#user-notf-clear {
            background: none !important;
            width: max-content;
            line-height: 34px;
            color: #b11515;

        }

        #sidebar::after {
            background-color: #e2e3e3;


        }

        #sidebar ul > li > ul > li a:hover {
            background: #020225;
        }

        #sidebar ul li.active > a {
            color: #e2d2ef !important;
            background: #09097bab !important;
        }

        #sidebar ul.components {
            background: transparent;
        }

        #sidebar ul li a {
            color: #737fb9;

        }

        .header {
            box-shadow: 0px 0px 12px 10px #0000001a;

        }

        .page {
            background: #f1f1f17a;
        }

        .row-cards-one .mycard .left .link {
            background: transparent !important;
            color: #fff;

        }

        .row-cards-one .mycard .left .link {
            width: max-content;

        }

        #sidebar ul > li > ul > li a {

            color: #685598

        }

        #sidebar ul li > a:hover, #sidebar ul li > a.active {
            background: #020221ab;
            /*background: #16023cb5;*/

        }

        .header .right-eliment .list li a {
            color: #090666;

        }

        .header .right-eliment .list li a i {
            font-size: 20px;
        }

        #sidebar ul > li > ul > li a:hover span {
            color: #9f95b1 !important;
        }

        #sidebar {
            z-index: 90;
            top: -76px;

        }

        .menu-toggle-button .nav-link span {

            background: #38025b;
        }

        a.admin-logo {
            padding: 0 5% !important;

        }

        #sidebar ul.components li a.admin-logo {
            filter: drop-shadow(0px 0px 12px #fff);
            /*filter: brightness(52.5);*/
            display: block !important;
            text-align: center;
            padding: 5% 0px 15% !important;
            background: transparent;
        }

        .header .right-eliment .list li a span {
            font-size: 10px;
            position: absolute;
            top: 7px;
            right: 0px;
            background: #f7043b;
            width: 17px;
            height: 17px;
            color: white;
            text-align: center;
            border-radius: 50%;
            line-height: 20px;
        }

        #geniustable .action-list {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important;
            display: -ms-flexbox !important;
            display: flex;
        }

        #geniustable .godropdown .action-list {

            display: none

        }

        .fa-edit:before {
            margin-left: 10px;
        }

        .action-list a {
            width: max-content !important;
        }

        .header .right-eliment .list li .dropdown-menu {
            /*right: 0;*/
            /*left: -15px;*/

        }

        .header .right-eliment .list li .dropdown-menu {
            width: max-content;

        }

        .action-list a {
            width: max-content;
        }

        .my-table-responsiv .table tr:hover {
            background: #00000005;
        }

        .content-area h5.card-header, .canvasjs-chart-container {
            text-align: start !important;

        }

        table.dataTable thead th, table.dataTable thead td, table.dataTable tbody th, table.dataTable tbody td {

            text-align: start;
        }

        .dashboard-home-table td img {
            height: 70px;
            border-radius: 5px;
            width: 70px;
            border: 1px solid #ececec;
            box-shadow: 5px 5px 10px #ccccccb8;
        }


        .row-cards-one .mycard:hover {
            transform: none !important;
        }

        .wave.wave-success .svg-icon svg g [fill] {
            fill: #1BC5BD;
        }

        .wave.wave-info {
            background-color: rgba(137, 80, 252, 0.1) !important;
        }

        .wave.wave-info .svg-icon svg g [fill] {
            fill: #8950FC;
        }

        .wave.wave-warning {
            background-color: rgba(255, 168, 0, 0.1) !important;
        }

        .wave.wave-warning .svg-icon svg g [fill] {
            fill: #FFA800;
        }

        .wave.wave-danger {
            background-color: rgba(246, 78, 96, 0.1) !important;
        }

        .wave.wave-danger .svg-icon svg g [fill] {
            fill: #F64E60;
        }

        .wave.wave-light {
            background-color: rgba(243, 246, 249, 0.1) !important;
        }

        .wave.wave-light .svg-icon svg g [fill] {
            fill: #F3F6F9;
        }

        .wave.wave-dark {
            background-color: rgba(24, 28, 50, 0.1) !important;
        }

        .wave.wave-dark .svg-icon svg g [fill] {
            fill: #181C32;
        }

        .wave.wave-white {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }

        .wave.wave-white .svg-icon svg g [fill] {
            fill: #ffffff;
        }

        @-webkit-keyframes animate-wave {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }




        .table-hover tbody tr:hover {
            background-color: #0000000a;
        }


        .content-area h5.card-header {
            color: #2d3274 !important
        }

        img.img-icon {
            width: 90px;
            float: right;
        }

        .row-cards-one .mycard .left .title {
            min-height: 64px;
        }

        .header .right-eliment .list li.bell-area .dropdown-menu .dropdownmenu-wrapper:hover {
            background: #73729c3b;
            color: #fff;
        }

        .header .right-eliment .list li .dropdown-menu .dropdownmenu-wrapper {
            transition: .5s;

        }

        .header .right-eliment .list li .dropdown-menu .dropdownmenu-wrapper:hover a {
            color: #fff;
        }

        img.img-icon-header {
            width: 21px;
            margin-bottom: 6px;
        }

        .ap-product-categories .cat-box.box2 .icon, .ap-product-categories .cat-box.box3 .icon {
            background: #2d3274;
        }



        .ap-product-categories .cat-box.box3 {
            background-image: -webkit-linear-gradient(
                180deg, #7d5dd7 0%, #4d53e5 100%);
            background
        }

        .header .right-eliment .list li {
            position: relative;
        }

        div.dataTables_wrapper div.dataTables_filter label {

            text-align: start;
        }

        .mr-table, .add-product-content {
            box-shadow: -1px 1px 15px #ccc;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin: 0 .5em;
        }

        .header .right-eliment .list li .dropdown-menu .dropdownmenu-wrapper ul li a:hover {
            color: #3e3594;
        }

        .dropdown-menu {
            text-align: start;

        }

        a.clear {
            border: none;
        }

        .header .right-eliment .list li .dropdown-menu .dropdownmenu-wrapper:hover a {
            color: #090242;
        }

        .ap-product-categories .cat-box.box1 {
            background-image: -webkit-linear-gradient(
                -1deg, #464de4f7 0%, #815ed6 100%);
        }

        .ap-product-categories .cat-box.box2 {
            background-image: -webkit-linear-gradient(
                0deg, #7f5dd6 0%, #4e53e5 100%);
        }

        .version-name {
            color: #cecde2;
            padding-left: 0;
            text-align: center;
        }
              .ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
    top: 7px;
            }
  @media (max-width: 768px) {
      .header .right-eliment .list li .dropdown-menu {

    /*max-width: 120px;*/
    width: 226px !important;}
      .header .right-eliment .list li .dropdown-menu {
    left: -60px;
}
.dropdown-menu.lang-dropdown {
    right: 0;
    left: -15px !important;
}
                .header .d-flex {
    display:block !important;
}
a.admin-logo img {
    max-height: 70px;
    margin: 5px auto;
    display: block;
    height: 45px;}
    .header .right-eliment .list li a {

    padding: 15px 4px 15px;}
    .header .right-eliment,.menu-toggle-button {
    margin: 0;
    display: inline !important;
}
.page .header .menu-toggle-button .nav-link {
    left: auto;
    right: 25px;
    bottom: auto;
    top: 65%;
}
.header .right-eliment .list li.login-profile-area .user-img img {
    width: 35px;
    height: 35px;
    margin-bottom: 14px;}
    #sidebar.active{
    min-width: 81%;
        top: 0;

    }
    .row-cards-one {
    margin-top: 15px;
}
.c-info-box-area {
    margin-bottom: 20px;
}
.c-info-box-area .c-info-box {
    width: 150px;
    height: 150px;
    border-width: 12px;}
/*.wave {*/

/*    margin: 10px 8px;}*/
/*    .c-info-box-area {*/
/*    padding: 25px 30px 25px;}*/
/*    .c-info-box-area .c-info-box p {*/

/*    line-height: 128px;*/
/*}*/
.card {
    margin-bottom: 20px;
    padding-bottom: 15px;
}

canvas.canvasjs-chart-canvas {
    width: auto !important;
}
div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate {
    text-align: start;
}
.mr-table .page-item .page-link {
    padding: 6px 10px;}
    .ap-product-categories .cat-box {

    margin-bottom: 20px;}
    div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate {
    overflow: hidden;
}
.mr-breadcrumb .add-btn {
    float: initial;}
.add-product-content .product-description .body-area .input-field {
    margin-bottom: 10px !important;
}
.add-product-content {
    margin-top: 20px;
}
.add-product-content1 .product-description .body-area {
    padding: 30px 30px 30px 30px;
}
.add-product-content1 .product-description .body-area .left-area .heading {

    text-align: start;}
    .img-upload #image-preview input, .img-upload #image-preview label, .img-upload #image-preview input {
    margin-left: 0px;
    left: 50%;
    margin-top: -95px;}
    table.dataTable>tbody>tr.child span.dtr-title {
    display: block;}
    #sidebar {
    top: 0px;
}
  }
 @media (min-width: 768px) and (max-width: 991px){
     #sidebar {
    top: 0px;
}
.header .right-eliment .list li .dropdown-menu {

    right: -85px;

}

.menu-toggle-button {

    display: none !important;
}
}
    </style>
    <style>

        .header{
            background: #09097bab !important;
/*background-color: #16023cb5;*/
            /*background: linear-gradient(*/
            /*    88deg, #10837b,#10837b);*/
        }
      .dt-button buttons-csv{

          background-color: #032c6b;
      }
    </style>

</head>
<body>
<div class="page">
    <div class="page-main">
        <!-- Header Menu Area Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <a class="admin-logo" href="{{ route('front.index') }}" target="_blank">
                        <img src="{{asset('assets/images/'.$gs->logo)}}" alt="">
{{--                        <img src="https://www.sub.weegze.com/assets/images/1619291885logo.png" alt="">--}}

                    </a>
                    <div class="menu-toggle-button">
                        <a class="nav-link" href="javascript:;" id="sidebarCollapse">
                            <div class="my-toggl-icon">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                        </a>
                    </div>

                    <div class="right-eliment">
                        <ul class="list">


                            <li class="bell-area">
                                <a id="notf_conv" class="dropdown-toggle-1" href="javascript:;" style="background-color: #e2e3e3; border-radius: 50%;">
                                    <i class="far fa-newspaper"></i>
                                </a>
                                <div class="dropdown-menu lang-dropdown">
                                    @foreach(locales() as $key => $locale)
                                        <div class="dropdownmenu-wrapper" data-language="{{$key}}"
                                             onclick="window.location='{{get_locale_changer_url($key)}}';"
                                             id="conv-notf-show">
                                            {{ $locale }}
                                        </div>
                                    @endforeach
                                </div>
                            </li>


                            <li class="login-profile-area">
                                <a class="dropdown-toggle-1" href="javascript:;">
                                    <div class="user-img">
                                        <img
                                            src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/admins/'.Auth::guard('admin')->user()->photo ):asset('assets/images/noimage.png') }}"
                                            alt="">
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdownmenu-wrapper">
                                        <ul>
                                            <li>
                                                <a href="{{ route('admin.profile') }}"><i
                                                        class="fas fa-user"></i> @lang('site.Edit Profile')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.password') }}"><i
                                                        class="fas fa-cog"></i> @lang('site.Change Password')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.logout') }}"><i
                                                        class="fas fa-power-off"></i> @lang('site.logout')</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu Area End -->
        <div class="wrapper">
            <!-- Side Menu Area Start -->
            <nav id="sidebar" class="nav-sidebar">
                <ul class="list-unstyled components" id="accordion">
                    <li>
                        <a class="admin-logo" href="{{ route('front.index') }}" target="_blank">
{{--                                                        <img src="{{asset('images/logo.jpeg')}}" alt="">--}}

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="wave-effect"><i
                                class="fa fa-home mr-2"></i>@lang('site.dashboard')</a>
                    </li>
                        @include('includes.admin.roles.super')

                    @include('partials._session')

                </ul>
                    <p class="version-name"> Version: 1.7.4</p>
            </nav>
            <!-- Main Content Area Start -->

        @yield('content')
        <!-- Main Content Area End -->
        </div>

    </div>


</div>

@php
    $curr = \App\Models\Currency::where('is_default','=',1)->first();
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.jss"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
    var mainurl = "{{url('/')}}";

    var getattrUrl = '{{ route('admin-prod-getattributes') }}';
    var curr = {!! json_encode($curr) !!};

</script>

<!-- Dashboard Core -->
<script src="{{asset('assets/admin/js/vendors/jquery-1.12.4.min.js')}}"></script>

<script src="{{asset('assets/admin/js/vendors/vue.js')}}"></script>
<script src="{{asset('assets/admin/js/vendors/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>
<!-- Fullside-menu Js-->
<script src="{{asset('assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/fullside-menu/waves.min.js')}}"></script>

<script src="{{asset('assets/admin/js/plugin.js')}}"></script>
<script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/admin/js/tag-it.js')}}"></script>
<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{asset('assets/admin/js/notify.js') }}"></script>

<script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>

<script src="{{asset('assets/admin/js/load.js')}}"></script>
<!-- Custom Js-->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
<!-- AJAX Js-->
<script src="{{asset('assets/admin/js/myscript.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="/vendor/datatables/buttons.server-side.js"></script>

@yield('scripts')


</body>
<style>
    .buttons-excel ,.buttons-pdf{

        background-color: red;
    }
</style>

</html>
