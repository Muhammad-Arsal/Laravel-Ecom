<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $heading_name = "Home Page";
        $span_data = "Latest Products";
        $page_name = "Home";

        $data = compact('heading_name', "span_data", "page_name");

        return view('frontend.index')->with($data);
    }
}
