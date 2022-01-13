@php
              $affilate=0; // appear section set 1
              $disputes=0; // appear section set 1
              @endphp
        <div class="col-lg-4">
          <div class="user-profile-info-area">
            <ul class="links">
                @php

                  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                  {
                    $link = "https";
                  }
                  else
                  {
                    $link = "http";

                    // Here append the common URL characters.
                    $link .= "://";

                    // Append the host(domain name, ip) to the URL.
                    $link .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL
                    $link .= $_SERVER['REQUEST_URI'];
                  }

                @endphp
              <li class="{{ $link == route('user-dashboard') ? 'active':'' }}">
                <a href="{{ route('user-dashboard') }}">
                    @lang('site.user-dashboard')
                </a>
              </li>

              @if(Auth::user()->IsVendor())
                <li>
                  <a href="{{ route('vendor-dashboard') }}">
                      @lang('site.vendor-dashboard')
                  </a>
                </li>
              @endif

              <li class="{{ $link == route('user-orders') ? 'active':'' }}">
                <a href="{{ route('user-orders') }}">
                    @lang('site.user-orders')
                </a>
              </li>
              @php
              $affilate==0; // appear section set 1
              @endphp

                @if($affilate==1)
                   @if($gs->is_affilate == 1)

                    <li class="{{ $link == route('user-affilate-code') ? 'active':'' }}">
                        <a href="{{ route('user-affilate-code') }}">@lang('site.user-affilate-code')</a>
                    </li>

                    <li class="{{ $link == route('user-wwt-index') ? 'active':'' }}">
                        <a href="{{route('user-wwt-index')}}">user-wwt-index</a>
                    </li>

                  @endif
              @endif


              <li class="{{ $link == route('user-order-track') ? 'active':'' }}">
                  <a href="{{route('user-order-track')}}">@lang('site.user-order-track')</a>
              </li>

              <li class="{{ $link == route('user-favorites') ? 'active':'' }}">
                  <a href="{{route('user-favorites')}}">@lang('site.user-favorites')</a>
              </li>

              <li class="{{ $link == route('user-messages') ? 'active':'' }}">
                  <a href="{{route('user-messages')}}">@lang('site.user-messages')</a>
              </li>

              <li class="{{ $link == route('user-message-index') ? 'active':'' }}">
                  <a href="{{route('user-message-index')}}">@lang('site.user-message-index')</a>
              </li>



                @if($disputes==1)
              <li class="{{ $link == route('user-dmessage-index') ? 'active':'' }}">
                  <a href="{{route('user-dmessage-index')}}">user-dmessage-index</a>
              </li>
              @endif

              <li class="{{ $link == route('user-profile') ? 'active':'' }}">
                <a href="{{ route('user-profile') }}">
                    @lang('site.profile')
                </a>
              </li>

              <li class="{{ $link == route('user-reset') ? 'active':'' }}">
                <a href="{{ route('user-reset') }}">
                    @lang('site.user-reset')
                </a>
              </li>

              <li>
                <a href="{{ route('user-logout') }}">
                  @lang('site.logout')
                </a>
              </li>

            </ul>
          </div>
{{--          @if($gs->reg_vendor == 1)--}}
{{--            <div class="row mt-4">--}}
{{--              <div class="col-lg-12 text-center">--}}
{{--                <a href="{{ route('user-package') }}" class="mybtn1 lg">--}}
{{--                  <i class="fas fa-dollar-sign"></i> {{ Auth::user()->is_vendor == 1 ? $langg->lang233 : (Auth::user()->is_vendor == 0 ? $langg->lang233 : $langg->lang237) }}--}}
{{--                </a>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          @endif--}}
        </div>
