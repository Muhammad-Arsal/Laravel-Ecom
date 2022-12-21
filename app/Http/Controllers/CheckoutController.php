<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\OrderedProducts;
use App\Models\SupplierProducts;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function order_details(Request $request)
    {
        $bill_record_collector = OrderDetails::latest()->first();
        if (!empty($bill_record_collector)) {

            $current_bill_number = $bill_record_collector->order_number;

            $last_number = substr($current_bill_number, 6);

            $incremented_last_number = ++$last_number;

            $generated_bill_number = "AMD_00" . $incremented_last_number;
        } else {
            $generated_bill_number = "AMD_001";
        }

        $recentOrder = new OrderDetails();
        $user_id = Auth::guard('customer')->id();

        $recentOrder->first_name = $request->f_name;
        $recentOrder->last_name = $request->l_name;
        $recentOrder->phone = $request->phone;
        $recentOrder->email = $request->email;
        $recentOrder->country_id = $request->country_id;
        $recentOrder->address = $request->address;
        $recentOrder->postal_code = $request->postal;
        $recentOrder->city = $request->city;
        $recentOrder->user_id = $user_id;
        $recentOrder->order_number = $generated_bill_number;

        $recentOrder->save();

        $user_cart_items = UserCart::where('user_id', $user_id)->get();

        foreach ($user_cart_items as $items) {
            $respective_price = SupplierProducts::where('product_id', $items->product_id)->first();
            $current_stock = $respective_price->stock;
            $last_inserted = OrderDetails::latest()->first();
            $last_inserted_id = $last_inserted->id;

            $orderedProduct = new OrderedProducts();

            $orderedProduct->user_id = $user_id;
            $orderedProduct->order_number = $generated_bill_number;
            $orderedProduct->product_id = $items->product_id;
            $orderedProduct->quantity = $items->quantity;
            $orderedProduct->status = 0;
            $orderedProduct->single_price = $respective_price->sale_price;
            $orderedProduct->total_price = $respective_price->sale_price * $items->quantity;
            $orderedProduct->order_id = $last_inserted_id;
            $orderedProduct->save();

            $new_stock_entry = $current_stock - $items->quantity;
            $current_id = $respective_price->id;
            $supplierProduct = SupplierProducts::find($current_id);
            $supplierProduct->stock = $new_stock_entry;
            $supplierProduct->save();

            $matchThese = ["product_id" => $items->product_id, "user_id" => $user_id];
            $cart_deletion = UserCart::where($matchThese)->first();
            $respective_row_delete = UserCart::find($cart_deletion->id);
            $respective_row_delete->delete();
        }

        return redirect()->route('confirmation.page');
    }
}
