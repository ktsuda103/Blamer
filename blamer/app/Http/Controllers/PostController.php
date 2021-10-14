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

    /**
     * 投稿画面を表示
     * 
     * 
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * 投稿処理
     * $param PostFormRequest
     * 
     */
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

    
}
