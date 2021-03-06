<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Point;
use App\Models\BestComment;
use App\Models\Good;
use App\Http\Requests\ProfileFormRequest;


class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = \Auth::user();
        $post_model = new Post();
        $point_model = new Point();
        $best_comment_model = new BestComment();
        $posts = $post_model->get_my_item($user['id']);
        $point = $point_model->get_point($user['id']);
        $best_comment = $best_comment_model->get_my_best_comment($user['id']);
        return view('mypage/mypage',compact('posts','user','point','best_comment'));
    }

    public function good()
    {
        $user = \Auth::user();
        $good_model = new Good();
        $point_model = new Point();
        $best_comment_model = new BestComment();
        $goods = $good_model->get_my_post_good($user['id']);
        $best_comment = $best_comment_model->get_my_best_comment($user['id']);
        return view('mypage/good',compact('goods','user','best_comment'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view('mypage/edit',compact('user'));
    }

    public function update(ProfileFormRequest $request)
    {
        $user_id = \Auth::id();
        $name = $request->input('name');
        $email = $request->input('email');
        User::where('id',$user_id)->update(['name'=>$name,'email'=>$email]);
        return redirect()->route('mypage/index')->with('success','プロフィールを更新しました。');
    }

    public function delete(Request $request)
    {
        $user_id = $request->input('user_id');
        $user_model = new User();
        $user_model->delete_user($user_id);
        return redirect()->route('login')->with('success','退会処理が完了しました。');
    }
}
