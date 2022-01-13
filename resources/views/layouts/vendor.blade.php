<!doctype html>
<html lang="en" dir="ltr">
@php
$prod_import=0; // to appear set value = 1
$package=0; // to appear set value = 1
$withdraws=0; // to appear set value = 1
$affiliate=0; // to appear set value = 1
@endphp

<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="author" content="GeniusOcean">
      	<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title>
{{--            {{$gs->title}}--}}
        </title>
		<!-- favicon -->
{{--		<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>--}}
		<!-- Bootstrap -->
		<link href="{{asset('assets/vendor/css/bootstrap.min.css')}}" rel="stylesheet" />
		<!-- Fontawesome -->
		<link rel="stylesheet" href="{{asset('assets/vendor/css/fontawesome.css')}}">
		<!-- icofont -->
		<link rel="stylesheet" href="{{asset('assets/vendor/css/icofont.min.css')}}">
		<!-- Sidemenu Css -->
		<link href="{{asset('assets/admin/plugins/fullside-menu/css/dark-side-style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/vendor/plugins/fullside-menu/waves.min.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/vendor/css/plugin.css')}}" rel="stylesheet" />

		<link href="{{asset('assets/vendor/css/jquery.tagit.css')}}" rel="stylesheet" />
    	<link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap-coloroicker.css') }}">
		<!-- Main Css -->

	@if(app()->getLocale()=='ar')

	<link href="{{asset('assets/admin/css/rtl/style.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/rtl/custom.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/rtl/responsive.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/admin/css/common.css')}}" rel="stylesheet" />
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
            background: linear-gradient(86deg, #0e0154, #010225);
            /*background: linear-gradient(86deg, #6c057d, #0d0140);*/

        }

        #sidebar ul > li > ul > li a:hover {
            background: #020225;
        }

        #sidebar ul li.active > a {
            color: #e2d2ef !important;
            /* background: #36035d !important; */
            background: #09097bab !important;
            /*background: #11a9e0 !important;*/
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
            /*top: -76px;*/

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

        .wave {
            background-color: #e2dcd8;
            overflow: hidden;
            position: relative;
            /* max-height: 236px; */
            margin: 30px 8px;
            box-shadow: 16px 17px 16px #ccc;

        }

        .row-cards-one .mycard:hover {
            transform: none !important;
        }

        .row-cards-one .wave.wave-animate-slower {
            transition: .5s;

        }

        .row-cards-one .mycard .left .link {
            color: #b1a6ff;

        }

        .c-info-box-area {
            background: #2824540d;
        }

        .row-cards-one .wave.wave-animate-slower:hover {
            transform: translateY(-7px);
        }

        .wave > div {
            z-index: 1;
        }

        .wave:before {
            content: ' ';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ffffff;
            z-index: -1;
        }

        .wave:after {
            content: ' ';
            width: 1000px;
            height: 1025px;
            position: absolute;
            bottom: 65%;
            left: -250px;
            border-radius: 35%;
            background: white;
            z-index: 0;
        }

        .wave:after {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .wave-animate:after {
            -webkit-animation: animate-wave 15s infinite linear;
            animation: animate-wave 15s infinite linear;
        }

        .wave-animate-slower:after {
            -webkit-animation: animate-wave 30s infinite linear;
            animation: animate-wave 30s infinite linear;
        }

        .wave-animate-slow:after {
            -webkit-animation: animate-wave 25s infinite linear;
            animation: animate-wave 25s infinite linear;
        }

        .wave-animate-fast:after {
            -webkit-animation: animate-wave 10s infinite linear;
            animation: animate-wave 10s infinite linear;
        }

        .wave-animate-faster:after {
            -webkit-animation: animate-wave 5s infinite linear;
            animation: animate-wave 5s infinite linear;
        }

        .wave.wave-primary {
            background-color: rgba(54, 153, 255, 0.1) !important;
        }

        .wave.wave-primary .svg-icon svg g [fill] {
            fill: #004890;
        }

        .wave.wave-secondary {
            background-color: rgba(228, 230, 239, 0.1) !important;
        }

        .wave.wave-secondary .svg-icon svg g [fill] {
            fill: #E4E6EF;
        }

        .wave.wave-success {
            background-color: rgba(27, 197, 189, 0.1) !important;
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

        @keyframes animate-wave {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }


        .row-cards-one .mycard.bg1 {
            background-image: -webkit-gradient(linear, left top, right top, from(#f85108c4), to(#f4ad3cbf));
            background-image: -webkit-linear-gradient(left, #f85108ba, #f4ad3cc7);
            background-image: -o-linear-gradient(left, #f85108, #f4ad3c);
            background-image: linear-gradient(to right, #f85108c7, #f4ad3c9c);
        }

        .row-cards-one .mycard.bg1::after, .row-cards-one .mycard.bg2::after, .row-cards-one .mycard.bg3::after, .row-cards-one .mycard.bg6::after, .row-cards-one .mycard.bg5::after, .row-cards-one .mycard.bg4::after {

            background: #060137;

            opacity: .09;

        }

        .row-cards-one .mycard {
            background: linear-gradient(
                45deg, #060139e3, #06075f73) !important;
            padding: 12% 40px 12%;
            margin-bottom: 0;
        }

        .row-cards-one .mycard.bg2 {
            background-image: -webkit-gradient(linear, left top, right top, from(#047edf87), to(#0bb9faad));
            background-image: -webkit-linear-gradient(left, #047edf87, #0bb9faad);
            background-image: -o-linear-gradient(left, #047edf87, #0bb9faad);
            background-image: linear-gradient(to right, #047edf87, #0bb9faad);
        }

        .row-cards-one .mycard.bg3 {
            background-image: -webkit-gradient(linear, left top, right top, from(#0fa49bbd), to(#03dbce96));
            background-image: -webkit-linear-gradient(left, #0fa49bbd, #03dbce96);
            background-image: -o-linear-gradient(left, #0fa49bbd, #03dbce96);
            background-image: linear-gradient(to right, #0fa49bbd, #03dbce96);
        }

        .row-cards-one .mycard.bg4 {
            background-image: -webkit-gradient(linear, left top, right top, from(#5a49e9ad), to(#7a6cf09e));
            background-image: -webkit-linear-gradient(left, #5a49e9ad, #7a6cf09e);
            background-image: -o-linear-gradient(left, #5a49e9ad, #7a6cf09e);
            background-image: linear-gradient(to right, #5a49e9ad, #7a6cf09e);
        }

        .row-cards-one .mycard.bg5 {
            background-image: -webkit-gradient(linear, left top, right top, from(#cf0633b8), to(#f96079b3));
            background-image: -webkit-linear-gradient(left, #cf0633b8, #f96079b3);
            background-image: -o-linear-gradient(left, #cf0633b8, #f96079b3);
            background-image: linear-gradient(to right, #cf0633b8, #f96079b3);
        }

        .row-cards-one .mycard.bg6 {
            background-image: -webkit-gradient(linear, left top, right top, from(#129021c4), to(#1ed41e99));
            background-image: -webkit-linear-gradient(left, #129021c4, #1ed41e99);
            background-image: -o-linear-gradient(left, #129021c4, #1ed41e99);
            background-image: linear-gradient(to right, #129021c4, #1ed41e99);
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
            .wave {

                margin: 10px 8px;}
            .c-info-box-area {
                padding: 25px 30px 25px;}
            .c-info-box-area .c-info-box p {

                line-height: 128px;
            }
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
	</head>


	<body>
		<div class="page">
			<div class="page-main">
            @include('partials._session')

            <!-- Header Menu Area Start -->
				<div class="header">
					<div class="container-fluid">
						<div class="d-flex justify-content-between">
						<a class="admin-logo" href="{{ route('front.index') }}" target="_blank">
{{--								<img src="{{asset('assets/images/'.$gs->logo)}}" alt="">--}}
                            <img src="https://www.sub.weegze.com/assets/images/1619291885logo.png" alt="">

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
										<a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
											<i class="icofont-cart"></i>
											<span data-href="{{ route('vendor-order-notf-count',Auth::guard('web')->user()->id) }}" id="order-notf-count">{{ App\Models\UserNotification::countOrder(Auth::guard('web')->user()->id) }}</span>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper" data-href="{{ route('vendor-order-notf-show',Auth::guard('web')->user()->id) }}" id="order-notf-show">
										</div>
										</div>
									</li>
                                    <li class="bell-area">
                                        <a id="notf_conv" class="dropdown-toggle-1" href="javascript:;">
                                        {{--                                            <i class="far fa-envelope"></i>--}}
                                        <!--<i class="far fa-user"></i>-->
                                            <img src="{{asset('images/translate.png') }}" class="img-icon-header">
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
              @if(Auth::user()->is_provider == 1)
              <img src="{{ Auth::user()->photo ? asset(Auth::user()->photo):asset('assets/images/noimage.png') }}" alt="">
              @else
              <img src="{{ Auth::user()->photo ? asset('assets/images/users/'.Auth::user()->photo ):asset('assets/images/noimage.png') }}" alt="">
              @endif
											</div>
										</a>
										<div class="dropdown-menu">
											<div class="dropdownmenu-wrapper">
													<ul>
														<h5>{{ trans('site.vendororder') }}</h5>

															<li>
																<a target="_blank" href="{{ route('front.vendor',str_replace(' ', '-', Auth::user()->shop_name)) }}"><i class="fas fa-eye"></i> {{ trans('site.shipping')}}</a>
															</li>

															<li>
																<a href="{{ route('user-dashboard') }}"><i class="fas fa-sign-in-alt"></i> {{ trans('site.user-dashboard') }}</a>
															</li>

															<li>
																<a href="{{ route('vendor-profile') }}"><i class="fas fa-user"></i> {{ trans('site.vendor-profile') }}</a>
															</li>
															<li>
																<a href="{{ route('user-logout') }}"><i class="fas fa-power-off"></i> {{ trans('site.logout') }}</a>
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
								<a target="_blank" href="{{ route('front.vendor',str_replace(' ', '-', Auth::user()->shop_name)) }}" class="wave-effect"><i class="fas fa-eye mr-2"></i> {{ trans('site.shopping') }}</a>
							</li>

							<li>
								<a href="{{ route('vendor-dashboard') }}" class="wave-effect "><i class="fa fa-home mr-2"></i>{{ trans('site.dashboard') }}</a>
							</li>
							<li>
								<a href="#order" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-hand-holding-usd"></i>{{ trans('site.orders') }}</a>
								<ul class="collapse list-unstyled" id="order" data-parent="#accordion" >
                                   	<li>
                                    	<a href="{{route('vendor-order-index')}}"> {{ trans('site.orders') }}</a>
                                	</li>
								</ul>
							</li>

							<li>
								<a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="icofont-cart"></i>{{ trans('site.products') }}
								</a>
								<ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
									<li>
										<a href="{{ route('vendor-prod-types') }}"><span>{{ trans('site.types') }}</span></a>
									</li>
									<li>
										<a href="{{ route('vendor-prod-index') }}"><span>{{ trans('site.products') }}</span></a>
									</li>
									<li>
										<a href="{{ route('admin-vendor-catalog-index') }}"><span>{{ trans('site.Catalog Products') }}</span></a>
									</li>
								</ul>
							</li>

{{--                            <li class="bell-area">--}}
{{--                                <a id="notf_conv" class="dropdown-toggle-1" href="javascript:;">--}}
{{--                                --}}{{--                                            <i class="far fa-envelope"></i>--}}
{{--                                <!--<i class="far fa-user"></i>-->--}}
{{--                                    <img src="{{asset('images/translate.png') }}" class="img-icon-header">--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu lang-dropdown">--}}
{{--                                    @foreach(locales() as $key => $locale)--}}
{{--                                        <div class="dropdownmenu-wrapper" data-language="{{$key}}"--}}
{{--                                             onclick="window.location='{{get_locale_changer_url($key)}}';"--}}
{{--                                             id="conv-notf-show">--}}
{{--                                            {{ $locale }}--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </li>--}}




                            @if($affiliate==1)
							<li>
								<a href="#affiliateprod" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="icofont-cart"></i>{{ trans('site.vendor-dashboard') }}
								</a>
								<ul class="collapse list-unstyled" id="affiliateprod" data-parent="#accordion">
									<li>
										<a href="{{ route('vendor-import-create') }}"><span>{{ trans('site.vendor-dashboard') }}</span></a>
									</li>
									<li>
										<a href="{{ route('vendor-import-index') }}"><span>{{ trans('site.vendor-dashboard') }}</span></a>
									</li>
								</ul>
							</li>
                          @endif

                            @if($prod_import==1)
							<li>
								<a href="{{ route('vendor-prod-import') }}"><i class="fas fa-upload"></i>{{ trans('site.vendor-dashboard') }}</a>
							</li>
							@endif

                            @if($withdraws==1)

							<li>
								<a href="{{ route('vendor-wt-index') }}" class=" wave-effect"><i class="fas fa-list"></i>{{ trans('site.vendor-dashboard') }}</a>
							</li>
                        	@endif
							<li>
								<a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
									<i class="fas fa-cogs"></i>{{ trans('site.settings') }}
								</a>
								<ul class="collapse list-unstyled" id="general" data-parent="#accordion">
                                    <li>
                                    	<a href="{{ route('vendor-service-index') }}"><span>{{ trans('site.services') }}</span></a>
                                    </li>
                                    <li>
                                    	<a href="{{ route('vendor-banner') }}"><span>{{ trans('site.vendor-banner') }}</span></a>
                                    </li>

                               @if($package==1)
                                    @if($gs->vendor_ship_info == 1)
	                                    <li>
	                                    	<a href="{{ route('vendor-shipping-index') }}"><span>{{ trans('site.shipping') }}</span></a>
	                                    </li>
	                                @endif
	                                @if($gs->multiple_packaging == 1)
	                                    <li>
	                                    	<a href="{{ route('vendor-package-index') }}"><span>{{ trans('site.package') }}</span></a>
	                                    </li>
	                                @endif
	                          @endif

                                    <li>
                                    	<a href="{{ route('vendor-social-index') }}"><span>{{ trans('site.settings') }}</span></a>
                                    </li>
								</ul>
							</li>

						</ul>


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

{{--		<script type="text/javascript">--}}

{{--		  var mainurl = "{{url('/')}}";--}}
{{--		  var admin_loader = {{ $gs->is_admin_loader }};--}}
{{--		  var whole_sell = {{ $gs->wholesell }};--}}
{{--		  var langg    = {!! json_encode($langg) !!};--}}
{{--			var getattrUrl = '{{ route('vendor-prod-getattributes') }}';--}}
{{--			var curr = {!! json_encode($curr) !!};--}}

{{--		</script>--}}

		<!-- Dashboard Core -->
		<script src="{{asset('assets/vendor/js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/vendors/bootstrap.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/jqueryui.min.js')}}"></script>
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets/vendor/plugins/fullside-menu/jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets/vendor/plugins/fullside-menu/waves.min.js')}}"></script>

		<script src="{{asset('assets/vendor/js/plugin.js')}}"></script>

		<script src="{{asset('assets/vendor/js/Chart.min.js')}}"></script>
		<script src="{{asset('assets/vendor/js/tag-it.js')}}"></script>
		<script src="{{asset('assets/vendor/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/vendor/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{asset('assets/vendor/js/notify.js') }}"></script>
		<script src="{{asset('assets/vendor/js/load.js')}}"></script>
		<!-- Custom Js-->
		<script src="{{asset('assets/vendor/js/custom.js')}}"></script>
		<!-- AJAX Js-->
		<script src="{{asset('assets/vendor/js/myscript.js')}}"></script>
		@yield('scripts')

{{--@if($gs->is_admin_loader == 0)--}}
{{--<style>--}}
{{--	div#geniustable_processing {--}}
{{--		display: none !important;--}}
{{--	}--}}
{{--</style>--}}
{{--@endif--}}

	</body>

</html>
