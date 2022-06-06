<x-guest-layout>
    <x-auth-card>

        <div class="container">
            <div class=" sign-in-form mb-3">
                <div>
                    Show: {{ $representation->show->title}}
                </div>
                <div>
                    Date: {{ $representation->when}}
                </div>
                <div>
                    Places: {{ $places}}
                </div>
                <div>
                    Total: {{ $representation->show->price * $places}} euros.
                </div>
            </div>
                <label for="card-holder-name">Card Holder Name</label>
                <input id="card-holder-name" type="text">

                <!-- Stripe Elements Placeholder -->
                <label for="card-element">Card</label>
                <div id="card-element"></div>

                <button class="mt-5 sign-in-form-button dark" id="card-button" data-secret="{{ $intent->client_secret }}">
                    Pay
                </button>
                <div id="card-message"></div>
                
            
        </div>
    </x-auth-card>
</x-guest-layout>



<script src="https://js.stripe.com/v3/"></script>
 
<script>
    window.onload = function() {
    const stripe = Stripe("<?= env('STRIPE_KEY') ?>");
 
    const elements = stripe.elements();
    const cardElement = elements.create('card',{'hidePostalCode':true});
 
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    
    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );
    
        if (error) {
            // Display "error.message" to the user...
            document.getElementById('card-message').innerHTML = error.message;
        } else {
            // The card has been verified successfully...
            document.getElementById('card-message').innerHTML = 'Paiement accepté';
            console.log(setupIntent);
            location.href= '/reservations/process?representation=<?= $representation->id ?>&places=<?= $places ?>&paymentMethod='+setupIntent.payment_method;
    
        }
    });
  }
</script>
