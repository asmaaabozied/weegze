@extends('layouts.admin')
@section('title')
    {{ __('site.Shipping Methods') }}
@endsection
@section('content')
          <input type="hidden" id="headerdata" value="{{ __('SHIPPING METHOD') }}">
          <div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.Shipping Methods') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('site.General Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-shipping-index') }}">{{ __('site.Shipping Methods') }}</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="product-area">
              <div class="row">
                <div class="col-lg-12">

                <div class="heading-area">
                  <h4 class="title">
                    {{ __('Multiple Shipping') }} :
                  </h4>
                                  <div class="action-list">
                                      <select class="process select droplinks {{ $gs->multiple_shipping == 1 ? 'drop-success' : 'drop-danger' }}">
                                        <option data-val="1" value="{{route('admin-gs-mship',1)}}" {{ $gs->multiple_shipping == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                        <option data-val="0" value="{{route('admin-gs-mship',0)}}" {{ $gs->multiple_shipping == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                      </select>
                                    </div>
                </div>



                  <div class="mr-table allproduct">

                        @include('includes.admin.form-success')

                    <div class="table-responsiv">
                        <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                          <thead>
                            <tr>

                                          <th>{{ __('site.title1') }}</th>
                                          <th>{{ __('site.price') }}</th>
                                          <th>{{ __('site.action') }}</th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

{{-- ADD / EDIT MODAL --}}

                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">


                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="submit-loader">
                            <img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
                        </div>
                      <div class="modal-header">
                      <h5 class="modal-title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">

                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('site.Close') }}</button>
                      </div>
                    </div>
                    </div>
</div>

{{-- ADD / EDIT MODAL ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header d-block text-center">
    <h4 class="modal-title d-inline-block">{{ __('site.Confirm Delete') }}</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>

      <!-- Modal body -->
      <div class="modal-body">
          <p class="text-center">{{ __("site.You are about to delete this") }}</p>
          <p class="text-center">{{ __("site.Do you want to proceed?") }}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('site.Cancel') }}</button>
            <a class="btn btn-danger btn-ok">{{ __('site.Delete') }}</a>
      </div>

    </div>
  </div>
</div>

{{-- DELETE MODAL ENDS --}}

@endsection

@section('scripts')


{{-- DATA TABLE --}}

    <script type="text/javascript">

    var table = $('#geniustable').DataTable({
         ordering: false,
               processing: true,
               serverSide: true,
               ajax: '{{ route('admin-shipping-datatables') }}',
               columns: [
                  { data: 'title', name: 'title' },
                  { data: 'price', name: 'price' },
                  { data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                  processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });

        $(function() {
            var mesg="{{ trans('site.add') }}";

            $(".btn-area").append('<div class="col-sm-4 table-contents">'+
          '<a class="add-btn" href="{{route('admin-shipping-create')}}" id="add-data" >'+
          '<i class="fas fa-plus"></i>'+mesg+
          '</a>'+
          '</div>');
      });

{{-- DATA TABLE ENDS--}}

</script>

@endsection
