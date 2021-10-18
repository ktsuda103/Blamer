@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <h1>{{$user['name']}}のページ</h1>
            <div class="text-center profile">     
                <p>{{ $user->email }}</p>
                <p>現在のポイント数：{{ number_format($point['point']) }}ポイント</p>
                <p>ベストコメント数：{{ $best_comment }}件</p>
            </div>
            <p class="link"><a href="{{ route('mypage/good') }}"><i class="fas fa-heart icon"></i>いいね一覧</a></p>
            <p class="link"><a href="{{ route('mypage/edit') }}"><i class="fas fa-user-edit icon"></i>編集する</a></p>
            <p class="link"><a href=""><i class="fas fa-door-closed icon"></i>退会する</a></p>
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
                                <a href="{{ route('post/detail',['id' => $post->id]) }}"><img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid image"></a>
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
