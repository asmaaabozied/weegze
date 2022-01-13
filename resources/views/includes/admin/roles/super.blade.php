@php
    //if 1 mean activate this section


    $Bulk_Product_Upload=0;  //http://xpress-24.com/admin/products/import


    $activation=0;      //http://xpress-24.com/admin/activation

    $maintenance=0;   //  http://xpress-24.com/admin/general-settings/maintenance

@endphp
@if(auth()->guard('admin')->user()->hasPermission('read_products'))

    <li>
        <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-cart"></i>{{ __('site.products') }}
        </a>
        <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
            @if(auth()->guard('admin')->user()->hasPermission('create_products'))

                <li>

                    <a href="{{ route('admin-prod-physical-create') }}"><span>{{ __("site.Add Product") }}</span></a>
                </li>
            @endif
            @if(auth()->guard('admin')->user()->hasPermission('read_products'))

                <li>
                    <a href="{{ route('admin-prod-index') }}"><span>{{ __('site.All Products') }}</span></a>
                </li>

            @endif

        </ul>
    </li>
@endif
@if(auth()->guard('admin')->user()->hasPermission('read_users'))

    <li>
        <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-user"></i>{{ __('site.users') }}
        </a>
        <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-user-index') }}"><span>{{ __('site.users') }}</span></a>
            </li>




        </ul>
    </li>
@endif


@if(auth()->guard('admin')->user()->hasPermission('read_orders'))

    <li>
        <a href="#order" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i
                class="fas fa-hand-holding-usd"></i>@lang('site.orders')</a>
        <ul class="collapse list-unstyled" id="order" data-parent="#accordion">
            <li>
                <a href="{{route('admin-order-index')}}"> @lang('site.orders')</a>
            </li>
            <li>
                <a href="{{route('admin-order-pending')}}">@lang('site.Pending Orders')</a>
            </li>
            <li>
                <a href="{{route('admin-order-processing')}}">@lang('site.Processing Orders')</a>
            </li>
            <li>
                <a href="{{route('admin-order-completed')}}">@lang('site.Completed Orders')</a>
            </li>
            <li>
                <a href="{{route('admin-order-declined')}}"> @lang('site.Declined Orders')</a>
            </li>

        </ul>
    </li>

@endif

@if(auth()->guard('admin')->user()->hasPermission('read_categories'))

    <li>
        <a href="#menu5" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i
                class="fas fa-sitemap"></i>{{ __('site.Manage Categories') }}</a>
        <ul class="collapse list-unstyled
        @if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category')
            show
@elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory')
            show
@elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory')
            show
@endif" id="menu5" data-parent="#accordion">
            <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category') active @endif">
                <a href="{{ route('admin-cat-index') }}"><span>{{ __('site.Main Category') }}</span></a>
            </li>
            <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory') active @endif">
                <a href="{{ route('admin-subcat-index') }}"><span>{{ __('site.Sub Category') }}</span></a>
            </li>
            <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory') active @endif">
                <a href="{{ route('admin-childcat-index') }}"><span>{{ __('site.Child Category') }}</span></a>
            </li>
        </ul>
    </li>
@endif


@if(auth()->guard('admin')->user()->hasPermission('read_geographies'))

    <li>
        <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-fw fa-newspaper"></i>{{ __('site.geography') }}
        </a>
        <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">
            <li>
                <a href="{{ route('country.index') }}"><span>{{ __('site.countries') }}</span></a>
            </li>
            <li>
                <a href="{{ route('city.index') }}"><span>{{ __('site.cities') }}</span></a>
            </li>

        </ul>
    </li>
@endif
@if(auth()->guard('admin')->user()->hasPermission('read_clients'))

    <li>
        <a href="{{ route('admin-clients-index') }}"><span><i class="icofont-users"></i>{{ __('site.clients') }}</span></a>
    </li>
@endif

@if(auth()->guard('admin')->user()->hasPermission('read_discountss'))

    <li>
        <a href="{{ route('admin-discounts-index') }}" class=" wave-effect"><i
                class="fas fa-cog"></i>@lang('site.discountss')</a>
    </li>
@endif
@if(auth()->guard('admin')->user()->hasPermission('read_inquiries'))

    <li>
        <a href="{{ route('admin-inquiries-index') }}" class="accordion-toggle wave-effect">
            <i class="icofont-users"></i>{{ __('site.inquiries') }}
        </a>

    </li>
@endif






@if(auth()->guard('admin')->user()->hasPermission('read_Coupons'))

    <li>
        <a href="{{ route('admin-coupon-index') }}" class=" wave-effect"><i
                class="fas fa-percentage"></i>{{ __('site.Coupons') }}</a>
    </li>
@endif





{{--@if(auth()->guard('admin')->user()->hasPermission('read_sliders'))--}}

{{--    <li>--}}
{{--        <a href="{{ route('admin-sl-index') }}"><span><i--}}
{{--                    class="fas fa-fw fa-newspaper"></i>{{ __('site.sliders') }}</span></a>--}}
{{--    </li>--}}
{{--@endif--}}
@if(auth()->guard('admin')->user()->hasPermission('read_services'))

    <li>
        <a href="{{ route('admin-service-index') }}"><span><i
                    class="fas fa-users-cog mr-2"></i>{{ __('site.services') }}</span></a>
    </li>
@endif





@if(auth()->guard('admin')->user()->hasPermission('read_pages'))

    <li>
        <a href="{{ route('admin-page-index') }}"><span><i
                    class="fas fa-fw fa-newspaper"></i>{{ __('site.pages') }}</span></a>
    </li>
@endif



@if(auth()->guard('admin')->user()->hasPermission('read_currencies'))

    <li><a href="{{route('admin-currency-index')}}"><span><i
                    class="fas fa-wrench"></i>{{ __('site.Currencies') }}</span></a></li>

@endif
@if(auth()->guard('admin')->user()->hasPermission('read_roles'))

    <li>
        <a href="{{ route('admin-role-index') }}" class=" wave-effect"><i
                class="fas fa-user-tag"></i>@lang('site.Manage Roles')</a>
    </li>
@endif
@if(auth()->guard('admin')->user()->hasPermission('read_settings'))

    <li>
        <a href="#socials" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-paper-plane"></i>{{ __('site.Social Settings') }}
        </a>
        <ul class="collapse list-unstyled" id="socials" data-parent="#accordion">
            <li><a href="{{route('admin-social-index')}}"><span>{{ __('site.Social Links') }}</span></a></li>

        </ul>
    </li>
@endif


{{--@if(auth()->guard('admin')->user()->hasPermission('read_reports'))--}}

{{--    <li><a href="{{ route('admin-report-index') }}"><i class="fas fa-user-secret"></i> {{ __('site.Reports') }}</a></li>--}}
{{--@endif--}}

{{--@if(auth()->guard('admin')->user()->hasPermission('read_subscription'))--}}

{{--    <li>--}}
{{--        <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i--}}
{{--                class="fas fa-users-cog mr-2"></i>{{ __('site.Subscribers') }}</a>--}}
{{--    </li>--}}
{{--@endif--}}


{{--@if(auth()->guard('admin')->user()->hasPermission('read_reports'))--}}

{{--    <li>--}}
{{--        <a href="#sactive" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">--}}
{{--            <i class="fas fa-cog"></i>{{ __('site.Reports') }}--}}
{{--        </a>--}}
{{--        <ul class="collapse list-unstyled" id="sactive" data-parent="#accordion">--}}

{{--            <li><a href="{{ route('getReportorders') }}"> {{ __('site.orders') }}</a></li>--}}
{{--            <li><a href="{{route('getReportproducts')}}"> {{ __('site.products') }}</a></li>--}}

{{--            <li><a href="{{route('getReportinquiries')}}"> {{ __('site.inquiries') }}</a></li>--}}
{{--            <li><a href="{{route('getReportvisitore')}}"> {{ __('site.visitors') }}</a></li>--}}
{{--            <li><a href="{{route('getReportvendors')}}"> {{ __('site.sellers') }}</a></li>--}}


{{--        </ul>--}}
{{--    </li>--}}
{{--@endif--}}
