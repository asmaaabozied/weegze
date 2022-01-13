@extends('layouts.admin')
@section('title')
    @lang('site.dashboard')
@endsection
@section('content')
    <div class="content-area">
        @include('includes.form-success')

        <div class="row row-cards-one">

            <div class="col-md-12 col-lg-6 col-xl-4" >
                <div class=" wave wave-animate-slower">
                    <div class="mycard bg4">
                        <div class="left">
                            <h5 class="title">@lang('site.Total Products')!</h5>
                            <span class="number">{{count($products)}}</span>
                            @if(auth()->guard('admin')->user()->hasPermission('read_products'))

                                <a href="{{route('admin-prod-index')}}" class="link">{{ __('site.View All') }}</a>
                            @endif
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">

                                <i class="icofont-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="wave wave-animate-slower">
                    <div class="mycard bg5">
                        <div class="left">
                            <h5 class="title">@lang('site.Total Customers')!</h5>
                            <span class="number">{{\App\Models\User::where('type', 'users')->count()}}</span>
                            @if(auth()->guard('admin')->user()->hasPermission('read_users'))

                                <a href="{{route('admin-clients-index')}}" class="link">{{ __('site.View All') }}</a>
                            @endif
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="icofont-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="wave wave-animate-slower">
                    <div class="mycard bg6">
                        <div class="left">
                            <h5 class="title">@lang('site.users')</h5>
                            <span class="number">{{\App\Models\User::where('type', 'Admin')->count()}}</span>

                            @if(auth()->guard('admin')->user()->hasPermission('read_users'))

                                <a href="{{ route('admin-user-index') }}" class="link">{{ __('site.View All') }}</a>

                            @endif
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="icofont-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="wave wave-animate-slower">
                    <div class="mycard bg1">
                        <div class="left">
                            <h5 class="title">@lang('site.Orders Pending')! </h5>
                            <span class="number">{{count($pending)}}</span>

                            <a href="{{route('admin-order-pending')}}" class="link">{{ __('site.View All') }}</a>
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="fas fa-hand-holding-usd"></i>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="wave wave-animate-slower">
                    <div class="mycard bg2">
                        <div class="left">
                            <h5 class="title">@lang('site.Orders Procsessing')!</h5>
                            <span class="number">{{count($processing)}}</span>
                            @if(auth()->guard('admin')->user()->hasPermission('read_roles'))

                            <a href="{{route('admin-order-processing')}}" class="link">{{ __('site.View All') }}</a>

                            @endif
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                                <i class="icofont-truck-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="wave wave-animate-slower">
                    <div class="mycard bg3">
                        <div class="left">
                            <h5 class="title">@lang('site.Orders Completed') !</h5>
                            <span class="number">{{count($completed)}} </span>
                            @if(auth()->guard('admin')->user()->hasPermission('read_roles'))

                            <a href="{{route('admin-order-completed')}}" class="link">{{ __('site.View All') }}</a>
                            @endif
                        </div>
                        <div class="right d-flex align-self-center">
                            <div class="icon">
                              <i class="icofont-check-circled"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>




@endsection

@section('scripts')

    <script language="JavaScript">
        displayLineChart();

        function displayLineChart() {
            var data = {
                labels: [
                    {!!$days!!}
                ],
                datasets: [{
                    label: "Prime and Fibonacci",
                    fillColor: "#3dbcff",
                    strokeColor: "#0099ff",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        {!!$sales!!}
                    ]
                }]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }



    </script>

    <script type="text/javascript">
        $('#poproducts').dataTable( {
            "ordering": false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            'responsive'  : true,
            'paging'  : false
        } );
    </script>


    <script type="text/javascript">
        $('#pproducts').dataTable( {
            "ordering": false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            'responsive'  : true,
            'paging'  : false
        } );
    </script>

    <script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,

                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($referrals as $browser)
                            {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                        ]
                    }
                ]
            });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($browsers as $browser)
                            {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                        ]
                    }
                ]
            });
        chart.render();
    </script>

@endsection
