<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        $post = new Post();
        $post = $post->get_one_item($id);
        return view('post/detail',compact('post'));
    }
}
