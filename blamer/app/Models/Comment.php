<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * コメントをデータベースに挿入
     * $param $comment,$user_id
     * 
     */
    public function insert_comment($comment,$post_id,$user_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->comment = $comment;
        $this->save();
    }
}
