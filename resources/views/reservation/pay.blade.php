@extends('layouts.app')

@section('title', 'Payer')

@section('content')
<div class="container">
    <form>
        <div class="payment" style="max-width:500px;margin:20px auto">
            <label for="card-holder-name">Card Holder Name</label>
            <input id="card-holder-name" type="text" >
            
            <!-- Stripe Elements Placeholder -->
            <div id="card-element"></div>
            
            <button id="card-button" class="button expanded">
                Process Payment
            </button>
        </div>
    </form>
</div>
@endsection


@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
 
<script>
    const stripe = Stripe('stripe-public-key');
 
    const elements = stripe.elements();
    const cardElement = elements.create('card');
 
    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');
 
cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );
 
    if (error) {
        // Display "error.message" to the user...
    } else {
        // The card has been verified successfully...
    }
});
</script>
@endsection