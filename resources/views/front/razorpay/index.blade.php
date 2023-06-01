@extends('front.layouts.master')
@section('content')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                    @endif
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                    @endif
                    <div class="card card-default">
                        <div class="card-header">
                            Laravel - Razorpay Payment Gateway Integration
                        </div>
                        <div class="card-body text-center">
                            <form action="{{ route('booking.demo.store') }}" method="POST" >
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="100"
                                        data-order_id=""
                                        data-buttontext="Pay 1 INR"
                                        data-name="abc.com"
                                        data-currency="GBP"
                                        data-description="Rozerpay"
                                        data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-note_key="Razorpay Corporate Office"
                                        data-theme.color="#ff7529">
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
@section('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$('body').on('click', '#rzp-button1', function (e) {
    e.preventDefault();
    var amount = $('.amount').val();
    var total_amount = amount * 100;
    var RAZORPAY_KEY = '';
    var options = {
        "key": RAZORPAY_KEY, // Enter the Key ID generated from the Dashboard
        "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
        "currency": "GBP",
        "name": "NiceSnippets",
        "description": "Test Transaction",
        "image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
        "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function (response) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('booking.demo.store') }}",
                data: {razorpay_payment_id: response.razorpay_payment_id, amount:   },
                success: function (data) {
                    $('.success-message').text(data.success);
                    $('.success-alert').fadeIn('slow', function () {
                        $('.success-alert').delay(5000).fadeOut();
                    });
                    $('.amount').val('');
                }
            });
        },
        "prefill": {
            "name": "",
            "email": "",
            "contact": ""
        },
        "notes": {
            "address": "test test"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
});
</script>
@endsection
