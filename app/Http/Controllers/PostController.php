<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Builder\Function_;
use App\Models\Post;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();

        $data = compact('allCategories');

        return view('backend.add_post')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "picture" => "required",
            "category" => "required",
            "description" => "required",
            "details" => "required",
        ]);

        $newPost = new Post;
        $newPost->title = $request['title'];
        $newPost->category_id = $request['category'];
        $newPost->description = $request['description'];
        $newPost->post_details = $request['details'];

        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('frontend/postImages'), $imageName);

        $newPost->image = $imageName;

        $newPost->save();

        return redirect()->route('admin.all_post');
    }

    public function show_all_posts()
    {
        $allPosts = Post::all();

        $data = compact('allPosts');

        return view('backend.all_posts')->with($data);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!is_null($post)) {

            unlink(public_path('frontend/postImages' . '/' . $post['image']));

            $post->delete();
        }
        return redirect()->route('admin.all_post');
    }
    public function edit($id)
    {
        $post = Post::find($id);

        $allCategories = Category::all();

        $data = compact('post', 'allCategories');

        return view('backend.edit_post')->with($data);
    }
    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $post->title = $request['title'];
        $post->category_id = $request['category_id'];
        $post->description = $request['description'];
        $post->post_details = $request['details'];

        if ($request['image']) {
            unlink(public_path('frontend/postImages' . '/' . $post['image']));

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('frontend/postImages'), $imageName);

            $post->image = $imageName;
        } else {
            $post->image = $post['image'];
        }

        $post->save();

        return redirect()->route('admin.all_post');
    }
}
