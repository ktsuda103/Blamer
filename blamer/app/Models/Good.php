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
}
