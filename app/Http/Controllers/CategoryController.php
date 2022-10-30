<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $heading_name = "Blog Page";
        $span_data = "Latest Posts";
        $page_name = "Blog";

        $latestPost = Post::where('category_id', $id)->paginate(5);

        $allCat = Category::all();

        $data = compact('heading_name', "span_data", "page_name", "latestPost", 'allCat');

        return view('frontend.blog')->with($data);
    }
}
