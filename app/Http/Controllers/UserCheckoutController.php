<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCheckoutController extends Controller
{
    function index()
    {
        $heading_name = "Checkout";
        $span_data = "Cart Products";
        $page_name = "Check out ";

        $data = compact('heading_name', 'span_data', 'page_name');

        return view('frontend.checkout')->with($data);
    }
}
