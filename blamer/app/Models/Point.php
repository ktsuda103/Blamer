<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    /**
     * ポイントデータを取得
     * $param $user_id
     * return $point_data
     */
    public function get_point($user_id)
    {
        $point_data = Point::where('user_id',$user_id)->first('point');
        return $point_data;
    }

    /**
     * ポイントを加算
     * $param $user_id,$point
     * 
     */
    public function insert_point($user_id,$point)
    {
        $point_data = $this->get_point($user_id);
        if(isset($point_data)){
            $point_data->point = $point_data->point + $point;
            $point_data->save();
        }else{
            $this->user_id = $user_id;
            $this->point = $point;
            $this->save();
        }
    }
}
