<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * 投稿データ挿入
     * $param $user_id,$data,$path
     * 
     */
    public function insert_item($user_id,$data,$path)
    {
        $this->user_id = $user_id;
        $this->title = $data['title'];
        $this->image = $path;
        $this->comment = $data['comment'];
        $this->status = 0;
        $this->save();
    }

    /**
     * 投稿データを取得するクエリ
     * $param void
     * return クエリ
     */
    private function get_item()
    {
        return Post::join('users','posts.user_id','=','users.id')
        ->select('posts.id','user_id','title','image','comment','status','posts.created_at as post_create','name','email')
        ->where('posts.status',0)
        ->orderBy('posts.created_at','DESC');
    }

    /**
     * 全ての投稿データを取得
     * $param void
     * return $item
     */
    public function get_all_item()
    {
        $posts = $this->get_item()->paginate(9);
        return $posts;
    }

    /**
     * 特定の投稿データを取得
     * $param $id
     * return $post
     */
    public function get_one_item($id)
    {
        $post = $this->get_item()->where('posts.id',$id)->first();
        return $post;
    }

    /**
     * 自分の投稿を取得
     * 
     * 
     */
    public function get_my_item($user_id)
    {
        $posts = $this->get_item()->where('user_id',$user_id)->orderBy('post_create','DESC')->paginate(6);
        return $posts;
    }
}
