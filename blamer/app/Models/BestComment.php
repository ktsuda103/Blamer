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
    public function insert_best_comment($user_id,$post_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->save();
    }
}
