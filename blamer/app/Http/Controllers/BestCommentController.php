<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BestComment;
use Illuminate\Support\Facades\DB;
use App\Models\Point;

class BestCommentController extends Controller
{
    /**
     * ベストコメントに設定
     * $param $request
     * 
     */
    public function store(Request $request){
        $best_comment_model = new BestComment();
        $point_model = new Point();
        $user_id = $request->input('user_id');
        $post_id = $request->input('post_id');
        $comment_id = $request->input('comment_id');
        DB::transaction(function()use($best_comment_model,$point_model,$user_id,$post_id,$comment_id){
            $best_comment_model->insert_best_comment($post_id,$comment_id);
            $point_model->insert_point($user_id,100);
        });
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','ベストコメントに設定しました。');
    }

    /**
     * ベストコメントデータを削除
     * $param $request
     * 
     */
    public function delete(Request $request)
    {
        $post_id = $request->input('post_id');
        $best_comment_id = $request->input('best_comment_id');
        $best_comment_model = new BestComment();
        $best_comment_model->delete_best_comment($best_comment_id);
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','ベストコメントを解除しました。');
    }
}
