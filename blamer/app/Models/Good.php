<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    public function insert_good($post_id,$user_id)
    {
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->save();
    }

    private function get_my_good()
    {
        $user_id = \Auth::id();
        return Good::where('user_id',$user_id);
    }

    public function get_the_post_good($post_id)
    {
        $good = $this->get_my_good()
        ->where('post_id',$post_id)
        ->first();
        return $good;
    }

    public function delete_good($good_id)
    {
        Good::where('id',$good_id)->delete();
    }
}
