<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use App\Models\Reservation;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('reservation.show', [
            'reservation'=>$reservation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        //check we have necessare information
        if(empty( $request->post('places')) || empty( $request->post('representation'))){
            return redirect(route('welcome'));
        }

        //retrieve info about representation
        $representation = Representation::find($request->post('representation'));
        $nbPlaces = $request->post('places');
        if(empty($representation)){
            return redirect(route('welcome'));
        }

        //check representation is bookable
        if(!$representation->show->bookable){
            return redirect(route('welcome'));
        }
        $intent = $request->user()->createSetupIntent();

        //display payment form
        return view('reservation.checkout', [
            'representation'=>$representation,
            'places'=>$nbPlaces,
            'intent' => $intent,
        ]);
    }

    /**
     * Receive data from payment form
     *
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Request $request)
    {

        $user = $request->user();
        if(empty($user->stripe_id)){
            $stripeCustomer = $user->createAsStripeCustomer();
        }

        $paymentMethod = $request->query('paymentMethod');

        $user->addPaymentMethod($paymentMethod);
        //dd($request->user()->paymentMethods());

        //Calculer prix
        $representation = Representation::find($request->query('representation'));
        $places = $request->query('places');
        $total = $places * $representation->show->price * 100;
        $stripeCharge = $request->user()->charge(
            $total, $paymentMethod
        );

        if($stripeCharge) {
            $reservation = new Reservation();
            $reservation->representation_id = $representation->id;
            $reservation->user_id = Auth::id();
            $reservation->places = $places;

            if($reservation->save()) {
                return redirect(route('reservations_forUser'));
            }
        }
        return redirect(route('reservation_failed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
