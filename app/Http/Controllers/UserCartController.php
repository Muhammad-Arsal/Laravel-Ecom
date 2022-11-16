<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    public function index()
    {
        $heading_name = "User Cart";
        $span_data = "Cart Products";
        $page_name = "User Cart";

        $data = compact('heading_name', 'span_data', 'page_name');

        return view('frontend.cart')->with($data);
    }


    public function addCart(Request $request)
    {
        if (Auth::guard('customer')->check()) {

            $user_id = Auth::guard('customer')->id();

            $product_id = $request->product_id;

            $user_cart = new UserCart();

            $user_cart->user_id = $user_id;

            $user_cart->product_id = $product_id;

            $user_cart->save();

            $cart = UserCart::all();

            $count_cart = count($cart);

            return response()->json(["count" => $count_cart], 200);
        } else {

            if (session('user.cart')) {

                $product_id = $request->product_id;

                session()->push("user.cart", $product_id);

                $count_cart = count(session('user.cart'));

                return response()->json(["count" => $count_cart], 200);
            }

            session()->put("user.cart", []);

            $product_id = $request->product_id;

            session()->push("user.cart", $product_id);

            $count_cart = count(session('user.cart'));

            return response()->json(["count" => $count_cart], 200);
        }
    }
}
