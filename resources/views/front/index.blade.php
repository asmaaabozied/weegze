{{--@extends('layouts.front')--}}

{{--@section('content')--}}

{{--	@if($ps->slider == 1)--}}

{{--		@if(count($sliders))--}}
{{--			@include('includes.slider-style')--}}
{{--		@endif--}}
{{--	@endif--}}

{{--	@if($ps->slider == 1)--}}
{{--		<!-- Hero Area Start -->--}}
{{--		<section class="hero-area">--}}
{{--			@if($ps->slider == 1)--}}

{{--				@if(count($sliders))--}}
{{--					<div class="hero-area-slider">--}}
{{--						<div class="slide-progress"></div>--}}
{{--						<div class="intro-carousel">--}}
{{--							@foreach($sliders as $data)--}}
{{--								<div class="intro-content {{$data->position}}" style="background-image: url({{asset('assets/images/sliders/'.$data->photo)}})"  onclick="window.location='{{$data->link}}';">--}}
{{--									<div class="container">--}}
{{--										<div class="row">--}}
{{--											<div class="col-lg-12">--}}
{{--												<div class="slider-content">--}}
{{--													<!-- layer 1 -->--}}
{{--													<div class="layer-1">--}}
{{--														<h4 style="font-size: {{$data->subtitle_size}}px; color: {{$data->subtitle_color}}" class="subtitle subtitle{{$data->id}}" data-animation="animated {{$data->subtitle_anime}}">{{$data->subtitle_text}}</h4>--}}
{{--														<h2 style="font-size: {{$data->title_size}}px; color: {{$data->title_color}}" class="title title{{$data->id}}" data-animation="animated {{$data->title_anime}}">{{$data->title_text}}</h2>--}}
{{--													</div>--}}
{{--													<!-- layer 2 -->--}}
{{--													<div class="layer-2">--}}
{{--														<p style="font-size: {{$data->details_size}}px; color: {{$data->details_color}}"  class="text text{{$data->id}}" data-animation="animated {{$data->details_anime}}">{{$data->details_text}}</p>--}}
{{--													</div>--}}
{{--													<!-- layer 3 -->--}}
{{--													<div class="layer-3">--}}
{{--														<a href="{{$data->link}}" target="_blank" class="mybtn1"><span> <i class="fas fa-chevron-right"></i></span></a>--}}

{{--                                                        {{ $langg->lang25 }}--}}
{{--                                                    </div>--}}
{{--												</div>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							@endforeach--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				@endif--}}

{{--			@endif--}}

{{--		</section>--}}
{{--		<!-- Hero Area End -->--}}
{{--	@endif--}}


{{--	@if($ps->featured_category == 1)--}}

{{--	--}}{{-- Slider buttom Category Start --}}
{{--	<section class="slider-buttom-category d-none d-md-block">--}}
{{--		<div class="container-fluid">--}}
{{--			<div class="row">--}}
{{--				@foreach($categories->where('is_featured','=',1) as $cat)--}}
{{--                @foreach(\App\Models\Category::where('is_featured','=',1)->get() as $cat)--}}


{{--					<div class="col-xl-2 col-lg-3 col-md-4 sc-common-padding">--}}
{{--						<a href="{{ route('front.category',$cat->slug) }}" class="single-category">--}}
{{--							<div class="left">--}}
{{--								<h5 class="title">--}}
{{--									{{ $cat->name }}--}}
{{--								</h5>--}}
{{--								<p class="count">--}}
{{--									{{ count($cat->products) }} @lang('site.products')--}}
{{--								</p>--}}
{{--							</div>--}}
{{--							<div class="right">--}}
{{--								<img src="{{asset('assets/images/categories/'.$cat->image) }}" alt="">--}}
{{--							</div>--}}
{{--						</a>--}}
{{--					</div>--}}
{{--				@endforeach--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</section>--}}
{{--	--}}{{-- Slider buttom banner End --}}


{{--	@endif--}}
{{--    <section class="banner-section">--}}
{{--        <div class="container">--}}
{{--            --}}{{--				@foreach($top_small_banners->chunk(2) as $chunk)--}}
{{--            <div class="row">--}}
{{--                @foreach($top_small_banners as $img)--}}
{{--                    <div class="col-lg-6 remove-padding">--}}
{{--                        <div class="left">--}}
{{--                            <a class="banner-effect" href="{{ $img->link }}" target="_blank">--}}
{{--                                <img src="{{asset('assets/images/banners/'.$img->photo)}}" alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            --}}{{--				@endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="banner-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($larages as $banner)--}}
{{--                <div class="col-lg-12 remove-padding">--}}
{{--                    <div class="img">--}}
{{--                        <a class="banner-effect" href="{{$banner->link}}">--}}
{{--                            <img src="{{asset('assets/images/banners/'.$banner->photo)}}" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


{{--    --}}{{--	@if($ps->featured == 1)--}}
{{--		<!-- Trending Item Area Start -->--}}
{{--		<section  class="trending">--}}
{{--			<div class="container">--}}
{{--				<div class="row">--}}
{{--					<div class="col-lg-12 remove-padding">--}}
{{--						<div class="section-top">--}}
{{--							<h2 class="section-title">--}}
{{--								{{ $langg->lang26 }}--}}
{{--                                @lang('site.mostrate')--}}
{{--							</h2>--}}
{{--							 <a href="#" class="link">@lang('site.View All')</a>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--				<div class="row">--}}
{{--					<div class="col-lg-12 remove-padding">--}}
{{--						<div class="trending-item-slider">--}}
{{--							@foreach($feature_products as $prod)--}}
{{--								@include('includes.product.slider-product')--}}
{{--							@endforeach--}}
{{--						</div>--}}
{{--					</div>--}}

{{--				</div>--}}
{{--			</div>--}}
{{--		</section>--}}

{{--    <section class="banner-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($top_small_bannerss as $ban)--}}
{{--                <div class="col-lg-4 remove-padding">--}}
{{--                    <div class="left">--}}
{{--                        <a class="banner-effect" href="{{ $ban->link }}" target="_blank">--}}

{{--                            //www.weegze.com/assets/images/banners/1564398600side-triple3.jpg--}}
{{--                            <img src=" {{asset('assets/images/banners/'.$ban->photo)}}" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--		<!-- Tranding Item Area End -->--}}
{{--	@endif--}}

{{--	@if($ps->small_banner == 1)--}}

{{--		<!-- Banner Area One Start -->--}}
{{--		<!-- Banner Area One Start -->--}}
{{--	@endif--}}

{{--	<section id="extraData">--}}
{{--		<div class="text-center">--}}
{{--			<img src="{{asset('assets/images/'.$gs->loader)}}">--}}
{{--		</div>--}}
{{--	</section>--}}


{{--@endsection--}}

{{--@section('scripts')--}}
{{--	<script>--}}
{{--        $(window).on('load',function() {--}}

{{--            setTimeout(function(){--}}

{{--                $('#extraData').load('{{route('front.extraIndex')}}');--}}

{{--            }, 500);--}}
{{--        });--}}

{{--	</script>--}}
{{--@endsection--}}
