@extends('layouts.admin')
@section('title')
    {{ __("site.details") }}
@endsection
@section('content')

                        <div class="content-area no-padding">
                            <div class="add-product-content1">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">

                                                <h4 class="heading"><a class="add-btn" href="{{ url()->previous() }}"><i
                                                            class="fas fa-arrow-left"></i> {{ __("site.back") }}</a></h4>

                                    <div class="table-responsive show-table">
                                        <table class="table">
                                            <tr>
                                                <th width="50%">{{ __("site.id") }}</th>
                                                <td>{{ $subs->user->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("site.name") }}</th>
                                                <td>{{ $subs->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("site.email") }}</th>
                                                <td>{{$subs->user->email}}</td>
                                            </tr>
                                            @if($subs->user->phone != "")
                                            <tr>
                                                <th>{{ __("site.phone") }}</th>
                                                <td>{{$subs->user->phone}}</td>
                                            </tr>
                                            @endif

                                            @if($subs->user->fax != "")
                                            <tr>
                                                <th>{{ __("site.Fax") }}</th>
                                                <td>{{$subs->user->fax}}</td>
                                            </tr>
                                            @endif

                                            @if($subs->user->address != "")
                                            <tr>
                                                <th>{{ __("site.address") }}</th>
                                                <td>{{$subs->user->address}}</td>
                                            </tr>
                                            @endif

                                            @if($subs->user->city != "")
                                            <tr>
                                                <th>{{ __("site.city") }}</th>
                                                <td>{{$subs->user->city}}</td>
                                            </tr>
                                            @endif

                                            @if($subs->user->zip != "")
                                            <tr>
                                                <th>{{ __("site.zip") }}</th>
                                                <td>{{$subs->user->zip}}</td>
                                            </tr>
                                            @endif

                                            <tr>
                                                <th>{{ __("site.Vendor Name") }}</th>
                                                <td>{{$subs->user->owner_name}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Vendor Phone Number") }}</th>
                                                <td>{{$subs->user->shop_number}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Vendor Shop Address") }}</th>
                                                <td>{{$subs->user->shop_address}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Vendor Registration Number") }}</th>
                                                <td>{{$subs->user->reg_number}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.message") }}</th>
                                                <td>{{$subs->user->shop_message}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Subscription Plan") }}</th>
                                                <td>{{$subs->title}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Currency Symbol") }}</th>
                                                <td>{{$subs->currency}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.cost") }}</th>
                                                <td>{{$subs->price}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Duration") }}</th>
                                                <td>{{$subs->days}} {{ __("site.Days") }}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.details") }}</th>
                                                <td>{!!$subs->details!!}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Duration") }}</th>
                                                <td>{{$subs->days}} {{ __("site.Days") }}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("site.Method") }}</th>
                                                <td>{{$subs->method}}</td>
                                            </tr>


                                          @if($subs->method == "Stripe")
                                            <tr>
                                                <th>{{ __("site.Transaction ID") }}</th>
                                                <td>{{$subs->txnid}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("site.Charge ID") }}</th>
                                                <td>{{$subs->charge_id}}</td>
                                            </tr>
                                            @elseif($subs->method == "Paypal")
                                            <tr>
                                                <th>{{ __("site.Transaction ID") }}</th>
                                                <td>{{$subs->txnid}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th>{{ __("site.Purchase Time") }}</th>
                                                <td>{{$subs->created_at->diffForHumans()}}</td>
                                            </tr>

                                        </table>
                                    </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection
