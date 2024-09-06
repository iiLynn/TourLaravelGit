@extends('welcome')

@section('content')
<div class="container">
    <h1>Finalizar Compra</h1>
    <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
    @csrf
    <div class="mb-3">
        <label for="card-element" class="form-label">Detalles de la Tarjeta de Crédito</label>
        <div id="card-element">
            <!-- Un elemento de Stripe se insertará aquí. -->
        </div>
    </div>
    <div id="card-errors" role="alert"></div>
    <button class="btn btn-success">Pagar ${{ $total }}</button>
</form>


</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env("STRIPE_KEY") }}');
    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', {style: style});
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>

@endsection
