@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-8">

            <div>Payments</div>

            <br>


            <table border="10px" class=" table table-hover">

                <tr>
                    <td>product1</td>

                    <td>payment</td>


                </tr>

                <tr>

                    <td> price1 25</td>
                    <td>


                        <button id="checkout"
                                role="button" class="btn  btn-success px-3 waves-effect waves-light">Visa/Mastercard Pay
                        </button>

                        <button id="checkoutMada"
                                role="button" class="btn  btn-success px-3 waves-effect waves-light"> Mada Pay
                        </button>


                    </td>


                </tr>

            </table>

            <br>


            <div id="showPayForm">


            </div>


        </div>

    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        function preparePaymentReq(type) {
            Swal.showLoading()
            Swal.fire({
                title: "جاري تجهيز طلبك",
                text: "هل انت متأكد من إتمام هذه العملية ؟",
                icon: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch("{{ route('dashboard.payments', [$offer->discount]) }}"+"?paymentMethodType="+type, {
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                        },
                    }).then(response => {
                        Swal.showLoading();
                        return response.json()
                        // response.json().then(response => {
                        //     console.log("RES::: "+JSON.stringify(response))
                        //     $('#showPayForm').html(response.content)
                        // })
                    }).catch(error => {
                        console.log("ERR::: " + JSON.stringify(error))
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value.status === true) {
                    console.log("RESS:: " + JSON.stringify(result))
                    $('#showPayForm').html(result.value.content)
                }
            });
        }

        $(document).on("click", "#checkout", function () {
            console.log("CHECKOUT CLICKED")
            preparePaymentReq('card')
        })

        $(document).on("click", "#checkoutMada", function () {
            console.log("CHECKOUT CLICKED")
            preparePaymentReq('mada')
        })

    </script>
@stop


