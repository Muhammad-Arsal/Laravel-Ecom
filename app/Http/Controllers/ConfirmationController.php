<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {
        $heading_name = "Confirmation Page";
        $span_data = "Ordered Products";
        $page_name = "Confirmation";

        $data = compact('heading_name', "span_data", "page_name");

        return view('frontend.confirmation')->with($data);
    }
}
