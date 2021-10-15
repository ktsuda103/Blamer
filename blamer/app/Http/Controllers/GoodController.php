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

    public function delete(Request $request)
    {
        $post_id = $request->input('post_id');
        $good_id = $request->input('good_id');
        $good_model = new Good();
        $good_model->delete_good($good_id);
        return redirect()->route('post/detail',['id'=>$post_id])->with('success','いいねを解除しました。');
    }
}
