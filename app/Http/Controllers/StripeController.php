<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{

    public function list_products()
    {
        $products = Product::all();
        return view('product',compact('products'));
    }

    public function stripe(String $id)
    {
        $data = Product::find($id);
        return view('stripe',compact('data'));
    }

    public function stripePost(Request $request)
    {
        //dd($request->all());
        $data = Product::find($request->prod_id);
        //dd($data);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
           
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                  'price' => $data->price_id,
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://127.0.0.1:8000/success.html',
                'cancel_url' => 'http://127.0.0.1:8000/cancel.html',
              ]);
              //dd($checkout_session);
  
            echo 'Payment successful, charge ID: ' . $checkout_session->id ;
            echo '<br><br> <a href="/"> Return to Home Page </a>';
            
          } catch (\Stripe\Exception\CardException $e) {

            // The card has been declined
            echo 'Error: ' . $e->getMessage();
            echo '<br><br> <a href="/"> Return to Home Page </a>';

          } catch (\Exception $e) {

            // error unrelated to Stripe
            echo 'Error: ' . $e->getMessage();
            echo '<br><br> <a href="/"> Return to Home Page </a>';

          }
        
    }

}
