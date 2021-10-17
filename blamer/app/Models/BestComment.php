<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestComment extends Model
{
    use HasFactory;

    /**
     * ベストコメントテーブルにデータを挿入
     * $param $user_id,$post_id
     * 
     */
    public function insert_best_comment($post_id,$comment_id)
    {
        $this->post_id = $post_id;
        $this->comment_id = $comment_id;
        $this->save();
    }

    /**
     * ベストコメントデータを取得
     * $param $post_id
     * return $best_comment
     */
    public function get_best_comment($post_id)
    {
        $best_comment = BestComment::where('post_id',$post_id)->first();
        return $best_comment;
    }

    /**
     * ベストコメントデータを削除
     * $param $best_comment_id
     * 
     */
    public function delete_best_comment($best_comment_id)
    {
        BestComment::where('id',$best_comment_id)->delete();
    }
}
