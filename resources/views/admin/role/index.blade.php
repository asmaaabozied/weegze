@extends('layouts.admin')
@section('title')
    @lang('site.roles')
@endsection
@section('content')
          <input type="hidden" id="headerdata" value="{{ __('ROLE') }}">
          <div class="content-area">
            <div class="mr-breadcrumb">
              <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">@lang('site.roles')</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">@lang('site.dashboard') </a>
                      </li>
                      <li>
                          <a href="{{ route('admin-role-index') }}">@lang('site.Manage Roles')</a>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="product-area">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mr-table allproduct">

                        @include('includes.admin.form-success')

                    <div class="table-responsiv">
                        <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                                          <th>@lang('site.name')</th>
{{--                                          <th width="50%"> @lang('site.permissions')</th>--}}
                                          <th>@lang('site.action')</th>
                            </tr>
                          </thead>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

{{-- DELETE MODAL --}}

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header d-block text-center">
    <h4 class="modal-title d-inline-block">{{ __("site.Confirm Delete") }}</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center">{{ __('site.You are about to delete this Role.') }}</p>
            <p class="text-center">{{ __('site.Do you want to proceed?') }}</p>
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
               ajax: '{{ route('admin-role-datatables') }}',
               columns: [
                        { data: 'name', name: 'name' },
                        // { data: 'section', name: 'section' },
                        { data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                  processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });

        $(function() {
            var mesg="{{ trans('site.add') }}";
            @if(auth()->guard('admin')->user()->hasPermission('create_roles'))

            $(".btn-area").append('<div class="col-sm-4 table-contents">'+
          '<a class="add-btn" href="{{route('admin-role-create')}}">'+
          '<i class="fas fa-plus"></i>'+mesg+
          '</a>'+
          '</div>');
            @endif
      });

{{-- DATA TABLE ENDS--}}

</script>

@endsection
