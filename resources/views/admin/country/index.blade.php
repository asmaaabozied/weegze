@extends('layouts.admin')
@section('title')
    {{ __('site.countries') }}
@endsection
@section('content')
{{--    <input type="hidden" id="headerdata" value="{{ __('CATEGORY') }}">--}}
{{--    <input type="hidden" id="attribute_data" value="{{ __('ADD NEW ATTRIBUTE') }}">--}}
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('site.countries') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('site.dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('site.countries') }}</a></li>
                        <li>
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
                            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th width="20%">{{ __('site.name') }}</th>
{{--                                    <th width="20%">{{ __('site.slug') }}</th>--}}
                                    <th>{{ __('site.code') }}</th>
{{--                                    <th>{{ __('site.status') }}</th>--}}
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
                    <img src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
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

    {{-- ATTRIBUTE MODAL --}}

    <div class="modal fade" id="attribute" tabindex="-1" role="dialog" aria-labelledby="attribute" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
{{--                    <img src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">--}}
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ATTRIBUTE MODAL ENDS --}}


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
            ajax: '{{ route('country.datatables') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'code', name: 'code'},
                // {data: 'attributes', name: 'attributes', searchable: false, orderable: false},
                // {data: 'status', searchable: false, orderable: false},
                {data: 'action', searchable: false, orderable: false},
                // {data: 'id'}

            ],
            language: {
                processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
            }
            // drawCallback: function (settings) {
            //     $('.select').niceSelect();
            // }
        });
{{--var site={{trans('site.add')}}--}}
        $(function () {
    var mesg="{{ trans('site.add') }}";
    @if(auth()->guard('admin')->user()->hasPermission('create_geographies'))

    $(".btn-area").append('<div class="col-sm-4 table-contents">' +
                '<a class="add-btn" href="{{route('country.create')}}" >' +
                '<i class="fas fa-plus"></i>'+mesg+
                '</a>' +
                '</div>');
    @endif
        });

        {{-- DATA TABLE ENDS--}}

    </script>

@endsection
