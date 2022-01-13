@extends('layouts.admin')
@section('title')
    {{ __('site.Reports') }}
@endsection
@section('content')

                        <div class="content-area no-padding">
                            <div class="add-product-content1">
                               <h4><a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("site.back") }}</a></h4>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">
                                                <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="table-responsive show-table">
                                                        <table class="table">
                                                            <tr>
                                                                <th>{{ __('site.Reporter') }}</th>
                                                                <td>{{$data->user->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('site.email') }}:</th>
                                                                <td>{{$data->user->email}}</td>
                                                            </tr>
                                                            @if($data->user->phone != "")
                                                            <tr>
                                                                <th>{{ __('site.phone') }}:</th>
                                                                <td>{{$data->user->phone}}</td>
                                                            </tr>
                                                            @endif

                                                            <tr>
                                                                <th>{{ __('site.Reported at') }}:</th>
                                                                <td>{{ date('d-M-Y h:i:s',strtotime($data->created_at))}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                    <div class="col-lg-6">
                                                    <h5 class="comment">
                                                        {{ __('site.title1') }}:
                                                        </h5>
                                                        <p class="comment-text">
                                                            {{$data->title}}
                                                        </p>

                                                    <h5 class="comment">
                                                        {{ __('site.message') }}:
                                                        </h5>
                                                        <p class="comment-text">
                                                            {{$data->note}}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection
