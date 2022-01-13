@extends('layouts.admin')
@section('title')
    {{ __('site.taxes') }}
@endsection
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.add') }} <a class="add-btn" href="{{url()->previous()}}"><i
                                class="fas fa-arrow-left"></i> {{ __('site.back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="{{route('tax.index')}}">{{ __('site.taxes') }}</a></li>
                        <li>
                        </li>
                        <li>
                            <a href="{{ route('tax.create') }}">{{ __('site.add') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            {{--                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>--}}
                            @include('includes.admin.form-both')
                            <form action="{{route('tax.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @include('partials._errors')

                                @bsMultilangualFormTabs

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.name') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        {{ BsForm::text('name')->attribute('class', 'input-field')->placeholder(trans('site.name')) }}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">
                                                {{ __('site.description') }} *
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        {{--                                  <textarea  class="nic-edit-p" name="details"></textarea>--}}
                                        {{ BsForm::textarea('description')->attribute('class', 'nic-edit-p')->placeholder('site.description') }}

                                    </div>
                                </div>

                                @endBsMultilangualFormTabs
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.type') }} *</h4>
                                            {{--                                      <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        <select class="form-control" name="type">
                                            <option value="Percentage">Percentage</option>
                                            <option value="Fixed value">Fixed value</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('site.discounts') }} *</h4>
                                            {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-7">

                                        {{ BsForm::number('discount')->attribute('class', 'input-field')->placeholder(trans('site.discounts')) }}

                                    </div>
                                </div>


                                {{--                          <div class="row">--}}
                                {{--                              <div class="col-lg-4">--}}
                                {{--                                  <div class="left-area">--}}
                                {{--                                      <h4 class="heading">{{ __('site.start_at') }} *</h4>--}}
                                {{--                                      --}}{{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                {{--                                  </div>--}}
                                {{--                              </div>--}}
                                {{--                              <div class="col-lg-7">--}}

                                {{--                                  {{ BsForm::date('start_at')->attribute('class', 'input-field')->placeholder(trans('site.date')) }}--}}

                                {{--                              </div>--}}
                                {{--                          </div>--}}


                                {{--                          <div class="row">--}}
                                {{--                              <div class="col-lg-4">--}}
                                {{--                                  <div class="left-area">--}}
                                {{--                                      <h4 class="heading">{{ __('site.end_at') }} *</h4>--}}
                                {{--                                      --}}{{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                {{--                                  </div>--}}
                                {{--                              </div>--}}
                                {{--                              <div class="col-lg-7">--}}

                                {{--                                  {{ BsForm::date('end_at')->attribute('class', 'input-field')->placeholder(trans('site.date')) }}--}}

                                {{--                              </div>--}}
                                {{--                          </div>--}}


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn" type="submit">{{ __('site.add') }}</button>
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
    <script type="text/javascript">

        {{-- TAGIT --}}

        $("#metatags").tagit({
            fieldName: "meta_tag[]",
            allowSpaces: true
        });

        $("#tags").tagit({
            fieldName: "tags[]",
            allowSpaces: true
        });
        {{-- TAGIT ENDS--}}
    </script>
@endsection

