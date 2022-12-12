<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCart;
use Illuminate\Contracts\Session\Session;
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

            if (UserCart::where('product_id', $product_id)->exists() && UserCart::where('user_id', $user_id)->exists()) {

                $existing_quantity = UserCart::where("product_id", $product_id)->first();

                $number_of_existing_quantity = $existing_quantity->quantity;

                $cart_column_id = $existing_quantity->id;

                $user_cart_row = UserCart::find($cart_column_id);

                $incremented_number_of_existing_quantity = ++$number_of_existing_quantity;

                $user_cart_row->quantity = $incremented_number_of_existing_quantity;

                $user_cart_row->save();

                $user_existing_cart = UserCart::where("user_id", $user_id)->sum('quantity');

                return response()->json(["count" => $user_existing_cart], 200);
            } else {
                $user_cart = new UserCart();

                $user_cart->user_id = $user_id;

                $user_cart->product_id = $product_id;

                $user_cart->save();

                $cart = UserCart::where("user_id", $user_id)->sum('quantity');

                return response()->json(["count" => $cart], 200);
            }
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

    public function cartItemDelete($id)
    {
        $cartItem = UserCart::find($id);

        $cartItem->delete();

        $user_id = Auth::guard('customer')->id();

        $number_of_items = UserCart::where("user_id", $user_id)->sum('quantity');

        return response()->json(["cartCount" => $number_of_items]);
    }

    public function sessionCartItemDelete(Request $request)
    {
        $key = $request->key;

        $session_quantity = array_key_last(session('user.cart'));

        $demo_array = session('user.cart');

        for ($i = 0; $i < $session_quantity; ++$i) {
            if (in_array($key, $demo_array)) {
                $search = array_search($key, $demo_array);
                unset($demo_array[$search]);
            }
        }

        $request->session()->put('user.cart', $demo_array);

        $count = count(session('user.cart'));

        return response()->json(["cartCount" => $count]);
    }

    public function incrementProductQuantity(Request $request)
    {
        $current_product_id = $request->productId;
        if (Auth::guard('customer')->check()) {

            $user_id = Auth::guard('customer')->id();

            $passingArray = ['user_id' => $user_id, 'product_id' => $current_product_id];

            $result = UserCart::where($passingArray)->first();

            $id_to_change = $result->id;

            $current_quantity_in_cart = $result->quantity;

            $user_cart_find = UserCart::find($id_to_change);

            $user_cart_find->quantity = ++$current_quantity_in_cart;

            $user_cart_find->save();

            $user_existing_cart = UserCart::where("user_id", $user_id)->sum('quantity');

            return response()->json(["count" => $user_existing_cart], 200);
        }
    }

    public function decrementProductQuantity(Request $request)
    {
        $current_product_id = $request->productId;
        if (Auth::guard('customer')->check()) {

            $user_id = Auth::guard('customer')->id();

            $passingArray = ['user_id' => $user_id, 'product_id' => $current_product_id];

            $result = UserCart::where($passingArray)->first();

            $id_to_change = $result->id;

            $current_quantity_in_cart = $result->quantity;

            $user_cart_find = UserCart::find($id_to_change);

            if ($current_quantity_in_cart > 0) {

                $user_cart_find->quantity = --$current_quantity_in_cart;

                $user_cart_find->save();
            }

            $user_existing_cart = UserCart::where("user_id", $user_id)->sum('quantity');

            return response()->json(["count" => $user_existing_cart], 200);
        }
    }
}
