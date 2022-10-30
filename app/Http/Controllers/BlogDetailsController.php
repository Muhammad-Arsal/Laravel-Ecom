<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function index($id)
    {
        $heading_name = "Post Details";
        $span_data = "Detailed Post";
        $page_name = "Post details";

        $relativePost = Post::find($id);

        $postId = $id;

        $allCat = Category::all();

        $data = compact('heading_name', "span_data", "page_name", 'relativePost', 'allCat', 'postId');

        return view('frontend.single-blog')->with($data);
    }
    public function comment(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "subject" => "required",
            "message" => "required",
            "email" => "required|email",
        ]);

        $commenter = new Comment;
        $commenter->commenter_name = $request['name'];
        $commenter->commenter_email = $request['email'];
        $commenter->subject = $request['subject'];
        $commenter->message = $request['message'];
        $commenter->post_id = $id;
        $commenter->save();

        return redirect()->back();
    }
}
