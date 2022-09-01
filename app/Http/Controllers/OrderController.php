<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Make an order
     */
    public function store(Request $request)
    {
        $userId = User::first()->id; //only for test purpose
        $currentUserCart =   Cart::whereUserId($userId)->first();
        if(!$currentUserCart){
            return response()->json(['No items in the cart...'], 200);
        }
        $cartItems = $currentUserCart->cartItems()->get();
        if($cartItems){
            $order = Order::create([
                'user_id'=>$userId,
                'total_price'=>$currentUserCart->total_price
            ]);
            foreach($cartItems as $item){
                $order->orderItems()->create([
                    'product_id'=>$item->product_id,
                    'price'=>$item->price,
                    'quantity'=>$item->quantity
                ]);                
            }
            $currentUserCart->cartItems()->delete();
            $currentUserCart->delete();
            return response()->json(['order' => $order], 200);
        }                
    }

    public function show(Order $order)
    {
        return $order;
    }
}
