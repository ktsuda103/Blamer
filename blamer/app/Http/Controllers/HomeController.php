<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


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
        $post = $post_model->get_one_item($id);
        $comment_model = new Comment();
        $comments = $comment_model->get_comment($id,$user_id);
        return view('post/detail',compact('post','comments'));
    }
}
