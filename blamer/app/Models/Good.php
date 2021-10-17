<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    /**
     * goodsテーブルにいいね情報を登録
     * $param $post_id,$user_id
     * 
     */
    public function insert_good($post_id,$user_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->save();
    }

    /**
     * 自分のいいねを取得
     * $param void
     * return クエリ
     */
    private function get_my_good()
    {
        $user_id = \Auth::id();
        return Good::where('user_id',$user_id);
    }

    /**
     * 投稿に対するいいねを取得
     * $param $post_id
     * return $good
     */
    public function get_the_post_good($post_id)
    {
        $good = $this->get_my_good()
        ->where('post_id',$post_id)
        ->first();
        return $good;
    }

    /**
     * いいね情報を削除
     * $param $good_id
     * 
     */
    public function delete_good($good_id)
    {
        Good::where('id',$good_id)->delete();
    }
}