<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Exception;

class CartController extends Controller
{
    /**
     * List all cart items for a user
     */
    public function index()
    {
        try {
            $userId = User::first()->id; //only for test purpose
            $carts =  Cart::whereUserId($userId)->with('cartItems')->first();
            if(!$carts){
                return response()->json(['data'=>'cart is empty.... please add some items to the cart'], 200);
            }
            return $carts;
        } catch (Exception $e) {
            return response()->json([$e->getMessage()], 400);
        }
    }
    /**
     * Adding items to cart
     * 
     */
    public function addTocart(Request $request, Product $product)
    {
        try {
            $userId = User::first()->id; //only for test purpose

            $cart = Cart::firstOrCreate(['user_id' => $userId]);
            $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();
            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => 1
                ]);
            }
            $totalPrice = 0;
            $cart->cartItems()->each(function ($item) use (&$totalPrice) {
                $totalPrice += ($item->price * $item->quantity);
            });

            $cart->update(['total_price' => $totalPrice]);

            return response()->json(['cart' => $cart->with('cartItems')->get()], 200);
        } catch (Exception $e) {
            return response()->json([$e->getMessage()], 400);
        }
    }
}
