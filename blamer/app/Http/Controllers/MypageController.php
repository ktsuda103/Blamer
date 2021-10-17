<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class MypageController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $post_model = new Post();
        $posts = $post_model->get_my_item($user['id']);
        return view('mypage',compact('posts','user'));
    }
}
