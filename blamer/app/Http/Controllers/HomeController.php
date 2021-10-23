<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Good;
use App\Models\BestComment;


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
        $best_comment_model = new BestComment();
        $post = $post_model->get_one_item($id);
        $comments = $comment_model->get_comment($id);
        $good = $good_model->get_the_post_good($user_id,$id);
        $best_comment = $best_comment_model->get_best_comment($id);
        return view('post/detail',compact('post','comments','good','best_comment'));
    }

    public function user_policy()
    {
        return view('policy/user_policy');
    }

    public function privacy_policy()
    {
        return view('policy/privacy_policy');
    }

    public function rank()
    {
        return view('rank');
    }
}
