<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * コメント
     * 
     * 
     */
    public function store(CommentFormRequest $request)
    {
        $comment = $request->input('comment');
        $post_id = $request->input('id');
        $user_id = \Auth::id();
        $comment_model = new Comment();
        $comment_model -> insert_comment($comment,$post_id,$user_id);
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','コメントしました。');

    }
}
