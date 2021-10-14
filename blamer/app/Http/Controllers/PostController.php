<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('post/create');
    }

    public function store(PostFormRequest $request)
    {
        $post = new Post();
        $user_id = \Auth::id();
        $data = $request->input();
        $file = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/images', $file);
        $post->insert_item($user_id,$data,$path);
        return redirect()->route('post/create')->with('success', '投稿完了しました。');
    }

    public function detail($id)
    {
        $post = new Post();
        $post = $post->get_one_item($id);
        return view('post/detail',compact('post'));
    }
}
