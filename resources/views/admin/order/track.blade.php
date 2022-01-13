@extends('layouts.admin')
<style>
    .product-description .show-table table tr th {
        text-align: start !important;

    }
    .add-product-content1 .product-description .body-area {
        padding: 30px 30px 30px 30px !important;
    }
    a.track-delete{
        padding: 6px 12px !important;
    }
</style>
@section('title')
    @lang('site.orders')
@endsection
@section('content')


    {{-- ADD ORDER TRACKING --}}
    <div class="content-area">
    <div class="add-product-content1">
        <div class="row">
            <h4 class="heading">@lang('site.Track Order')</h4>

            <div class="col-lg-12">
                <div class="product-description">
                    <div class="body-area">
                        <div class="gocover"
                             style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>

                        <input type="hidden" id="track-store" value="{{route('admin-order-track-store')}}">
                        <form action="{{route('admin-order-track-store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @include('includes.admin.form-both')

                            <input type="hidden" name="order_id" value="{{ $order->id }}">

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.title1') }} *</h4>
{{--                                        <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <textarea class="input-field form-control" id="track-title" name="title"
                                              placeholder="{{ __('site.title1') }}" required=""></textarea>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="left-area">
                                        <h4 class="heading">{{ __('site.details') }} *</h4>
{{--                                        <p class="sub-heading">{{ __('(In Any Language)') }}</p>--}}
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <textarea class="input-field form-control" id="track-details" name="text"
                                              placeholder="{{ __('site.details') }}" required=""></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <button class="addProductSubmit-btn" id="track-btn"
                                            type="submit">{{ __('site.add') }}</button>
                                    <button class="addProductSubmit-btn ml=3 d-none" id="cancel-btn"
                                            type="button">{{ __('site.Cancel') }}</button>
                                    <input type="hidden" id="add-text" value="{{ __('site.add') }}">
                                    <input type="hidden" id="edit-text" value="{{ __('site.update') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

{{--    <h5 class="text-center">TRACKING DETAILS</h5>--}}

    {{-- ORDER TRACKING DETAILS --}}

    <div class="content-area no-padding">
        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">


                            <div class="table-responsive show-table ml-3 mr-3">
                                <table class="table" id="track-load"
                                       data-href={{ route('admin-order-track-load',$order->id) }}>
                                    <tr>
                                        <th>{{ __("site.title1") }}</th>
                                        <th>{{ __("site.details") }}</th>
                                        <th>{{ __("site.date") }}</th>
                                        <th>{{ __("site.time") }}</th>
                                        <th>{{ __("site.Options") }}</th>
                                    </tr>
                                    @foreach($order->tracks as $track)

                                        <tr data-id="{{ $track->id }}">
                                            <td width="30%" class="t-title">{{ $track->title }}</td>
                                            <td width="30%" class="t-text">{{ $track->text }}</td>
                                            <td>{{  date('Y-m-d',strtotime($track->created_at)) }}</td>
                                            <td>{{  date('h:i:s:a',strtotime($track->created_at)) }}</td>
                                            <td>
                                                <div class="action-list">
                                                    <a data-href="{{ route('admin-order-track-update',$track->id) }}"
                                                       class="track-edit"> <i class="fas fa-edit"></i>{{trans('site.edit')}}</a>
                                                    <a href="javascript:;"
                                                       data-toggle="modal" data-target="#confirm-delete" class="delete"
                                                       data-href="{{ route('admin-order-track-delete',$track->id) }}"
                                                       class="track-delete"><i class="fas fa-trash-alt fa-2x"></i>{{trans('site.delete')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>


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
    </div>
@endsection
