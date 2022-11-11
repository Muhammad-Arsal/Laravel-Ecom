<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        $heading_name = "Home Page";
        $span_data = "Latest Products";
        $page_name = "Home";

        $allProducts = Products::take(12)->latest()->get();

        $data = compact('heading_name', "span_data", "page_name", "allProducts");

        return view('frontend.index')->with($data);
    }
}
