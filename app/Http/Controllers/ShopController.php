<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $heading_name = "Shop Category";
        $span_data = "All Products";
        $page_name = "Category";

        $data = compact('heading_name', "span_data", "page_name");

        return view('frontend.category')->with($data);
    }
}
