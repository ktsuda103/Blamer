<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Point;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * コメントする
     * $param $request
     * return redirect()
     */
    public function store(CommentFormRequest $request)
    {
        $comment = $request->input('comment');
        $post_id = $request->input('id');
        $user_id = \Auth::id();
        $comment_model = new Comment();
        $point_model = new Point();
        DB::transaction(function()use($comment,$post_id,$user_id,$comment_model,$point_model){
            $comment_model->insert_comment($comment,$post_id,$user_id);
            $point_model->insert_point($user_id,50);
        });
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','コメントしました。');

    }
}
