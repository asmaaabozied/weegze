@section('main')
    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$responseData['id']}}"></script>
    <form action="{{route('dashboard.verify.payments')}}" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
{{--    {{route('dashboard.payments',$id)}}--}}

@stop
