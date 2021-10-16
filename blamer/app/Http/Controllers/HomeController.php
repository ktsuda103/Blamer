<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Good;


class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->get_all_item();
        return view('home',compact('posts'));
    }

    public function detail($id)
    {
        $user_id = \Auth::id();
        $post_model = new Post();
        $comment_model = new Comment();
        $good_model = new Good();
        $post = $post_model->get_one_item($id);
        $comments = $comment_model->get_comment($id);
        $good = $good_model->get_the_post_good($id);
        return view('post/detail',compact('post','comments','good'));
    }
}
