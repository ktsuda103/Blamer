<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function insertItem($user_id,$data,$path)
    {
        $this->user_id = $user_id;
        $this->title = $data['title'];
        $this->image = $path;
        $this->comment = $data['comment'];
        $this->status = 0;
        $this->save();
    }
}
