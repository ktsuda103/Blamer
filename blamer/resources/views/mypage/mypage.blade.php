@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{$user['name']}}のページ</h1>
            <p>現在のポイント数：{{ number_format($point['point']) }}ポイント</p>
            <p>ベストコメント数：{{ $best_comment }}件</p>
            <p><a href="{{ route('mypage/good') }}">いいね一覧</a></p>
            <p><a href="">編集する</a></p>
            <p><a href="">退会する</a></p>
        </div>
        <div class="col-md-8">
            <h2>投稿一覧</h2>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card post-card">
                        <div class="card-header"><a href="{{ route('post/detail',['id' => $post->id]) }}">{{ $post->title }}</a></div>
                        <div class="text-center">
                            <div class="card-body">
                                <img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid image">
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>投稿者：{{ $post->name }}</p>
                            <p>{{ $post->post_create }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
