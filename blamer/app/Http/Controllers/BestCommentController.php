<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BestComment;

class BestCommentController extends Controller
{
    /**
     * ベストコメントに設定
     * $param $request
     * 
     */
    public function store(Request $request){
        $user_id = \Auth::id();
        $post_id = $request->input('post_id');
        $best_comment_model = new BestComment();
        $best_comment_model->insert_best_comment($user_id,$post_id);
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','ベストコメントに設定しました。');
    }
}
