<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view('backend.add_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            "category" => "required",
        ]);

        $category = new Category;
        $category->category_name = $request['category'];
        $category->save();

        return redirect()->route('admin.all_categories');
    }
    public function view_all()
    {
        $cat = Category::all();

        $data = compact('cat');

        return view('backend.all_categories')->with($data);
    }
}
