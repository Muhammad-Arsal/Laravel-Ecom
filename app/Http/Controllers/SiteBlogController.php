<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class SiteBlogController extends Controller
{
    public function index()
    {
        $heading_name = "Blog Page";
        $span_data = "Latest Posts";
        $page_name = "Blog";

        $latestPost = Post::latest()->paginate(5);

        $allCat = Category::all();

        $data = compact('heading_name', "span_data", "page_name", "latestPost", 'allCat');

        return view('frontend.blog')->with($data);
    }
}
