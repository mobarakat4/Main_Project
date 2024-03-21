<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    public function create(){
        $cart = Cart::where('user_id' , auth()->user()->id)
        ->where('status',0)
        ->first();
        
        $products=$cart->products;
        $total=$products->sum('price');
        return view('user.create-order',compact('products','total'));
    }
    
    public function checkout(OrderRequest $request){


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $cart = Cart::where('user_id' , auth()->user()->id)
        ->where('status',0)
        ->first();
        $products = $cart->products;
        // dd($products);
        $lineItems = [];
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalPrice += $product->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'egp',
                    'product_data' => [
                        'name' => $product->name,
                        // 'images' => [$product->image]
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ];
        }
        $lineItems[] =  [
            'price_data' => [
                'currency' => 'egp',
                'product_data' => [
                    'name' => 'shipping',
                    // 'images' => [$product->image]
                ],
                'unit_amount' => 50 * 100,
            ],
            'quantity' => 1,
        ];
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = Order::firstOrCreate(['user_id' => auth()->user()->id , 'status'=>0 , 'cart_id'=>$cart->id]);
        $order->total_price = $totalPrice + 50 ;
        $order->session_id = $session->id;
        $order->save();

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');
        
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            // return 'success';
            // $customer = \Stripe\Customer::retrieve($session->customer);
            
            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 0) {
                $order->status = 1;
                $order->save();
            }

            return view('user.checkout.checkout-success');
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

    }

    public function cancel()
    {
        return "the payment failed";
    }
}
