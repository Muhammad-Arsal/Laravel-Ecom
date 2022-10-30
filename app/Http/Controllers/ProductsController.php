<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('backend.product_area');
    }

    public function allProduct()
    {
        return view('backend.all_products');
    }

    public function allCategories()
    {
        return view('backend.all_product_categories');
    }

    public function addCategories()
    {
        return view('backend.add_product_categories');
    }

    public function addProduct()
    {
        $suppliers = Supplier::all();

        $data = compact('suppliers');

        return view('backend.add_products')->with($data);
    }
}
