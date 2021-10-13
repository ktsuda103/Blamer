<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('post/create');
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->input();
        dd($data);
    }
}
