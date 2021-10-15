<?php

namespace App\Http\Controllers;
use App\Models\Good;

use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function store(Request $request)
    {
        $post_id = $request->input('post_id');
        $user_id = \Auth::id();
        $good_model = new Good();
        $good_model->insert_good($post_id,$user_id);
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','いいねしました。');
    }
}
