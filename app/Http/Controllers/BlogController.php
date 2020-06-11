<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAllPost()
    {
        $posts = Posts::all();
        return view('web.page.blog', compact('posts'));
    }

    public function artikel($slug)
    {
        $post = Posts::where('slug', '=', $slug)->first();
        $relatedBlog = Posts::where('slug', '!=', $slug)->mightAlsoLike()->get();
        // $id = $post->id;
        // $total_view = PostView::totalView($id);

        //get Previous post
        // $previous = Post::where('id', '<', $id)->orderBy('id', 'desc')->first();
        // get Next post
        // $next = Post::where('id', '>', $id)->orderBy('id')->first();

        // PostView::createViewLog($posts);
        return view('web.page.detailBlog', compact('post', 'relatedBlog'));
    }
}
