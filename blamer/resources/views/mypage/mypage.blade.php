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
            <div class="profile">
            <p>{{ $user->email }}</p>  
                <ul>
                    <li class="profile-item">現在のランク：
                        <div class="d-inline rank">
                            @if($point['point'] >= 30000)
                                神
                            @elseif($point['point'] >= 10000)
                                King of Blamer
                            @elseif($point['point'] >= 5000)
                                上級Blamer
                            @elseif($point['point'] >= 2000)
                                中級Blamer
                            @elseif($point['point'] >= 500)
                                初級Blamer
                            @elseif($point['point'] > 0)
                                駆け出しBlamer
                            @else
                                入門
                            @endif
                        </div>
                    </li>
                    <li class="profile-item">現在のポイント数：{{ number_format($point['point']) }}ポイント</li>
                    <p class="small">→ポイントについては<a href="{{ route('rank') }}">こちら</a></p>
                    <li class="profile-item">ベストコメント数：{{ $best_comment }}件</li>
                </ul> 
            </div>
            <p class="link"><a href="{{ route('mypage/good') }}"><i class="fas fa-heart icon"></i>いいね一覧</a></p>
            <p class="link"><a href="{{ route('mypage/edit') }}"><i class="fas fa-user-edit icon"></i>編集する</a></p>
            <p class="link"><a href="{{ route('mypage/delete') }}"><i class="fas fa-door-closed icon"></i>退会する</a></p>
        </div>
        <div class="col-md-8">
            <h2>投稿一覧</h2>
            <div class="row">
                @if($posts->isEmpty())
                    <p class="message">現在、投稿はありません</p>
                @else
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
                <div class="col-8 offset-4">{{ $posts->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
