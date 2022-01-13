@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('styles')

    <style type="text/css">

        .input-field {
            padding: 15px 20px;
        }
        button.dt-button, div.dt-button, a.dt-button {

            border: 1px solid #091c31;

            background-image: -webkit-linear-gradient(top, #1f66d0 0%, #223ce5 100%) !important;
            background-image: -moz-linear-gradient(top, #110a73 0%, #1176e2 100%) !important;
            background-image: -ms-linear-gradient(top, #110a73 0%, #1f68b6 100%) !important;
            background-image: -o-linear-gradient(top, #110a73 0%, #1f68b6 100%) !important;
            background-image: linear-gradient(top, #110a73 0%, #1f68b6 100%) !important;
        }
    </style>
@endsection

@section('content')

    <input type="hidden" id="headerdata" value="{{ __('ORDER') }}">

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{$title}}({{$count}})</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">@lang('site.dashboard')</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{$title}}</a>
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
                            {{--                                            .$gs->admin_loader--}}
                            <div class="gocover"
                                 style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>


                            {!! $dataTable->table([
                                                   'class'=>'table table-hover dt-responsive table table-striped table-hover table-bordered','width'=>"100%",'cellspacing'=>"0"

                                                  ], true) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ORDER MODAL --}}

    <div class="modal fade" id="confirm-delete1" tabindex="-1" role="dialog" aria-labelledby="modal1"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="submit-loader">
                    <img src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">
                </div>
                <div class="modal-header d-block text-center">
                    <h4 class="modal-title d-inline-block">{{ __('Update Status') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">{{ __("You are about to update the order's Status.") }}</p>
                    <p class="text-center">{{ __('site.Do you want to proceed?') }}</p>
                    <input type="hidden" id="t-add" value="{{ route('admin-order-track-add') }}">
                    <input type="hidden" id="t-id" value="">
                    <input type="hidden" id="t-title" value="">
                    <textarea class="input-field" placeholder="Enter Your Tracking Note (Optional)"
                              id="t-txt"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('site.Cancel') }}</button>
                    <a class="btn btn-success btn-ok order-btn">{{ __('Proceed') }}</a>
                </div>

            </div>
        </div>
    </div>

    {{-- ORDER MODAL ENDS --}}



    {{-- MESSAGE MODAL --}}
    <div class="sub-categori">
        <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vendorformLabel">{{ __('site.Send Email') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-form">
                                        <form  action="{{route('sendmessages')}}"  method="post">
                                            {{csrf_field()}}
                                            <ul>
                                                <li>
                                                    <input type="email" class="input-field eml-val" id="eml" name="to"
                                                           placeholder="@lang('site.email') *" value="" required="">
                                                </li>
                                                <li>
                                                    <input type="text" class="input-field" id="subj" name="subject"
                                                           placeholder="@lang('site.subject')  *" required="">
                                                </li>
                                                <li>
                                                    <textarea class="input-field textarea" name="message" id="msg"
                                                              placeholder="@lang('site.message')  *"
                                                              required=""></textarea>
                                                </li>
                                            </ul>
                                            <button class="submit-btn" id="emlsub"
                                                    type="submit">@lang('site.Send Email')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MESSAGE MODAL ENDS --}}

    {{-- ADD / EDIT MODAL --}}

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="submit-loader">
                    {{--                                                        <img  src="{{asset('assets/images/'.$gs->admin_loader)}}" alt="">--}}
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

    {{-- ADD / EDIT MODAL ENDS --}}

@endsection

@section('scripts')

    <script src="{{asset('style/app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>

    <script
        src="{{asset('style/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('style/app-assets/js/custom/custom-script.js')}}"></script>

    <script src="{{asset('app-assets/vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>

    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('style/app-assets/js/scripts/page-users.js')}}'"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>




    <script>


        var myTable = null;

        function drawTableCallback(e) {
            //delete
            $('.update').click(function (e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_update')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete

            //delete
            $('.delete').click(function (e) {

                console.log("Tapped Delete button")
                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "error",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                            n.close();
                        })
                    ]
                });

                n.show();

            });//end of delete
        }

        $('#example').dataTable({
            "language": {
                "search": "Filter records:"
            }, buttons: [
                'print', 'copy'
            ]
        });
    </script>
    {!! $dataTable->scripts() !!}
@endsection
<style>


    .buttons-excel {
        background-color: #0B90C4;
        color: #8b1014;

    }

    .buttons-pdf,.btn btn-success {

        background-color: #8677A7;
        color: #2c4762;
    }

    .buttons-copy {
        background-color: #9cc2cb;
        color: red;


    }

    .buttons-print {
        background-color: #2ea8e5;
        color: darkred;
    }
</style>



