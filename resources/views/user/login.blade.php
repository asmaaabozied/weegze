@extends('layouts.front')

@section('content')

<section class="login-signup">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <nav class="comment-log-reg-tabmenu">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link login active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab"
              aria-controls="nav-log" aria-selected="true">
{{--              {{ $langg->lang197 }}--}}
                @lang('site.login')

            </a>
            <a class="nav-item nav-link" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab"
              aria-controls="nav-reg" aria-selected="false">
{{--              {{ $langg->lang198 }}--}}
                @lang('site.register')
            </a>

          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @include('partials._errors')

            <div class="tab-pane fade show active" id="nav-log" role="tabpanel" aria-labelledby="nav-log-tab">
            <div class="login-area">
              <div class="header-area">
                <h4 class="title">@lang('site.login')</h4>
              </div>
              <div class="login-form signin-form">
                @include('includes.admin.form-login')
                <form  action="{{ route('user.login.submit') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-input">
                    <input type="email" name="email" placeholder="{{trans('site.email')}}" required="">
                    <i class="icofont-user-alt-5"></i>
                  </div>
                  <div class="form-input">
                    <input type="password" class="Password" name="password" placeholder="{{ trans('site.password')}}"
                      required="">
                    <i class="icofont-ui-password"></i>
                  </div>
                  <div class="form-forgot-pass">
                    <div class="left">
                      <input type="checkbox" name="remember" id="mrp" {{ old('remember') ? 'checked' : '' }}>
                      <label for="mrp">{{trans('site.remember')}}</label>
                    </div>
                    <div class="right">
                      <a href="{{ route('user-forgot') }}">
                       @lang('site.forget')
                      </a>
                    </div>
                  </div>
                  <input type="hidden" name="modal" value="1">
                  <input class="mauthdata" type="hidden" value="">
                  <button type="submit" class="submit-btn">{{ trans('site.submit')}}</button>
{{--                  @if(App\Models\Socialsetting::find(1)->f_check == 1 || App\Models\Socialsetting::find(1)->g_check ==--}}
{{--                  1)--}}
                  <div class="social-area">
{{--                    <h3 class="title">{{ $langg->lang179 }}</h3>--}}
{{--                    <p class="text">{{ $langg->lang180 }}</p>--}}
                    <ul class="social-links">
{{--                      @if(App\Models\Socialsetting::find(1)->f_check == 1)--}}
                      <li>
                        <a href="{{ route('social-provider','facebook') }}">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
{{--                      @endif--}}
{{--                      @if(App\Models\Socialsetting::find(1)->g_check == 1)--}}
                      <li>
                        <a href="{{ route('social-provider','google') }}">
                          <i class="fab fa-google-plus-g"></i>
                        </a>
                      </li>
{{--                      @endif--}}
                    </ul>
                  </div>
{{--                  @endif--}}
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">

              <div class="login-area signup-area">
              <div class="header-area">
                <h4 class="title">{{ trans('site.register') }}</h4>
              </div>
              <div class="login-form signup-form">
                @include('includes.admin.form-login')
                <form action="{{route('user-register-submit')}}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-input">
                    <input type="text" class="User Name" name="name" placeholder="{{trans('site.name') }}" required="">
                    <i class="icofont-user-alt-5"></i>
                  </div>
                    <input type="text" class="User Name" name="type"
                           hidden value="users">
                  <div class="form-input">
                    <input type="email" class="User Name" name="email" placeholder="{{ trans('site.email')}}" required="" onkeypress="CheckSpace(event)">
                    <i class="icofont-email"></i>
                  </div>

                  <div class="form-input">
                    <input type="text" class="User Name" name="phone" placeholder="{{trans('site.phone') }}" required="" onkeypress="CheckSpace(event)">
                    <i class="icofont-phone"></i>
                  </div>

                  <div class="form-input">
                    <input type="text" class="User Name" name="address" placeholder="{{ trans('site.address') }}" required="">
                    <i class="icofont-location-pin"></i>
                  </div>

                  <div class="form-input">
                    <input type="password" class="Password" name="password" placeholder="{{ trans('site.password') }}"
                      required="">
                    <i class="icofont-ui-password"></i>
                  </div>

                  <div class="form-input">
                    <input type="password" class="Password" name="password_confirmation"
                      placeholder="{{ trans('site.password_confirmation') }}" required="">
                    <i class="icofont-ui-password"></i>
                  </div>

{{--                  @if($gs->is_capcha == 1)--}}

{{--                  <ul class="captcha-area">--}}
{{--                    <li>--}}
{{--                      <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i--}}
{{--                          class="fas fa-sync-alt pointer refresh_code "></i></p>--}}
{{--                    </li>--}}
{{--                  </ul>--}}

{{--                  <div class="form-input">--}}
{{--                    <input type="text" class="Password" name="codes" placeholder="{{ trans('site.code')}}" required="">--}}
{{--                    <i class="icofont-refresh"></i>--}}
{{--                  </div>--}}

{{--                  @endif--}}

                  <input class="mprocessdata" type="hidden" value="">
                  <button type="submit" class="submit-btn">{{trans('site.submit') }}</button>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

@endsection

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

