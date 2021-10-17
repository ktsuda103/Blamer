<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Point;

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
        DB::transaction(function()use($request){
            $post_model = new Post();
            $point_model = new Point();
            $user_id = \Auth::id();
            $data = $request->input();
            $file = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $file);
            $post_model->insert_item($user_id,$data,$path);
            $point_model->insert_point($user_id,100);
        });
        
        return redirect()->route('post/create')->with('success', '投稿完了しました。');
    }

    
}
