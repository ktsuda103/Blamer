<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Point;


class MypageController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $post_model = new Post();
        $point_model = new Point();
        $posts = $post_model->get_my_item($user['id']);
        $point = $point_model->get_point($user['id']);
        return view('mypage',compact('posts','user','point'));
    }
}
