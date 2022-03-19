@extends('layout.frontend')

@section('stripe')
    <?php

    ?>
@endsection

@section('title', 'Payment Page')

@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Total Amount to Pay: </h3>
                <p class="d-block">${{ $total }}</p>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <label for="cardNumber">Card Number</label>
                        <div id="cardNumber" class="border p-2 rounded"></div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="cardExpiry">Card Expiry</label>
                                <div id="cardExpiry" class="border p-2 rounded"></div>
                            </div>
                            <div class="col">
                                <label for="cardCVC">CVC</label>
                                <div id="cardCVC" class="border p-2 rounded"></div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-group">
                            <label for="nameOnCard">Name on Card</label>
                            <input type="text" name="name" id="nameoncard" placeholder="Name on Card" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="zipcode">Zip Code</label>
                            <input type="number" name="zipcode" id="zipcode" onkeydown="if(event.code != 'Backspace') if(this.value.length === 5) return false" placeholder="Zip Code" class="form-control">
                        </div>
                        <div id="error" class="text-danger"></div>
                        <button class="btn btn-primary w-100 mt-2" onclick="inicatePayment()">Pay</button>

                        <form action="{{ route('payment.complete') }}" method="post" class="d-none">
                            {{ csrf_field() }}
                            <input type="hidden" name="paymentIntent_id" id="paymentIntent_id">
                            <button id="completePayment">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51KUOdyGOMb6nWoUFdt1CyvAS1DEvitFswfW1MGBVVwEMzFt0lPi8nQgvdZf2Cw4mo9mX8gqUUzNn86Y3vOdfR9V500GrFvxpOj')
        var elements = stripe.elements()
        const style = {
            base: {
                color: "black",
                fontSmoothing: "antialiased",
                fontSize: "18px",
                "::placeholder": {
                color: "#aab7c4",
                },
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a",
            },
        }
        var cardNumber = elements.create('cardNumber', {
            showIcon: true,
            style: style
        })
        var cardExpiry = elements.create('cardExpiry', {
            style: style
        })
        var cardCVC = elements.create('cardCvc', {
            style: style
        })
        cardNumber.mount('#cardNumber')
        cardExpiry.mount('#cardExpiry')
        cardCVC.mount('#cardCVC')

        function inicatePayment()
        {
            var name = $('#nameoncard').val()
            var zipcode = $('#zipcode').val()
            if(!name || !zipcode)
            {
                $('#error').html('Name and Zipcode cannot be empty!')
                return
            }
            
            stripe.confirmCardPayment('{{ $paymentIntent->client_secret }}', {
                payment_method: {
                    card: cardNumber,
                    billing_details: {
                        name: name,
                        address: {
                            postal_code: zipcode
                        }
                    }
                }
            })
            .then(function(result) {
                console.log(result)
                if(result.error)
                {
                    $('#error').html(result.error.message)
                }
                if(result.paymentIntent)
                {
                    $('#paymentIntent_id').val(result.paymentIntent.id)
                    $('#completePayment').click()
                }
            })
        }
    </script>
@endsection