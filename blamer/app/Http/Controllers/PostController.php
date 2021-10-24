<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Point;
use Illuminate\Support\Facades\Storage;

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
        $post_model = new Post();
        $point_model = new Point();
        $user_id = \Auth::id();
        $data = $request->input();
        $file = $request->file('image');
        $path = Storage::disk('s3')->putFile('/test',$file,'public');
        DB::transaction(function()use($post_model,$point_model,$user_id,$data,$path){
            $post_model->insert_item($user_id,$data,$path);
            $point_model->insert_point($user_id,100);
        });
        
        return redirect()->route('post/create')->with('success', '投稿完了しました。');
    }

    
}
