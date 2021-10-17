<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    /**
     * ポイントを加算
     * $param $user_id,$point
     * 
     */
    public function insert_point($user_id,$point)
    {
        $this->user_id = $user_id;
        $this->point = $point;
        $this->save();
    }
}
