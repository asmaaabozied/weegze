@extends('layouts.admin')
@section('title')
    {{ __('site.categories') }}
@endsection

@section('content')

  <div class="content-area" id="app">

    <div class="add-product-content1">
      <div class="row">
        <div class="col-lg-12">
          <div class="product-description">
            <div class="body-area">
              @include('includes.admin.form-error')
{{--              <form action="{{route('admin-attr-store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                {{csrf_field()}}--}}
                {{ BsForm::resource('attr')->putModel($data, route('admin-attr-store', $data)) }}


                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="category_id" value="{{ $data->id }}">

                  @bsMultilangualFormTabs

                  <div class="row">
                      <div class="col-lg-4">
                          <div class="left-area">
                              <h4 class="heading">{{ __('site.name') }} *</h4>
                              {{--                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                          </div>
                      </div>
                      <div class="col-lg-7">
                          {{ BsForm::text('name')->placeholder(trans('site.name')) }}

                          {{--                              <input type="text" class="input-field" name="name" placeholder="{{ __('site.name') }}" required="" value="">--}}
                      </div>
                  </div>



                <br>


                <div class="row" v-if="counter > 0" id="optionarea">
                  <div class="col-md-12">
                    <div class="form-group">
                         <div class="row mb-2 counterrow" v-for="n in counter" :id="'counterrow'+n">
                           <div class="col-lg-4">
                             <div class="left-area">
                                 <h4 class="heading">{{ __('site.Option') }} *</h4>
{{--                                 <p class="sub-heading">{{ __('In English') }}</p>--}}
                             </div>
                           </div>
                           <div class="col-lg-6">
                               {{ BsForm::text('options[]')->placeholder(trans('site.Option'))->attribute('id','optionfield1') }}


{{--                               <input :id="'optionfield'+n" type="text" class="input-field" name="options[]" value="" placeholder="Option label" required>--}}

                           </div>
                           <div class="col-lg-1">
                             <button type="button" class="btn btn-danger text-white" @click="removeOption(n)"><i class="fa fa-times"></i></button>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-lg-7 offset-lg-4">
                             <button type="button" class="btn btn-success text-white" @click="addOption()"><i class="fa fa-plus"></i> Add Option</button>
                           </div>
                         </div>

                    </div>
                  </div>
                </div>

                  @endBsMultilangualFormTabs

                <div class="row">
                  <div class="col-lg-7 offset-lg-4">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="priceStatus1" name="price_status" class="custom-control-input" checked value="1">
                      <label class="custom-control-label" for="priceStatus1">@lang('site.Allow Price Field')</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-7 offset-lg-4">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="detailsStatus1" name="details_status" class="custom-control-input" checked value="1">
                      <label class="custom-control-label" for="detailsStatus1">@lang('site.Show on Details Page')</label>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-4">
                    <div class="left-area">

                    </div>
                  </div>
                  <div class="col-lg-7">
                    <button class="addProductSubmit-btn" type="submit">{{ __('site.add') }}</button>
                  </div>
                </div>

{{BsForm::close()}}            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        counter: 1
      },
      methods: {
        addOption() {
          $("#optionarea").addClass('d-block');
          this.counter++;
        },
        removeOption(n) {
          $("#counterrow"+n).remove();
          if ($(".counterrow").length == 0) {
            this.counter = 0;
          }
        }
      }
    })
  </script>
@endsection
