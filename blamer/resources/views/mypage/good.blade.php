@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{$user['name']}}のページ</h1>
            <div class="profile">        
                <ul>
                    <li class="profile-item">{{ $user->email }}</li>
                    <li class="profile-item">現在のポイント数：{{ number_format($point['point']) }}ポイント</li>
                    <li class="profile-item">ベストコメント数：{{ $best_comment }}件</li>
                </ul> 
            </div>
            <p class="link"><a href="{{ route('mypage/index') }}"><i class="fas fa-user icon"></i>マイページ</a></p>
            <p class="link"><a href="{{ route('mypage/edit') }}"><i class="fas fa-user-edit icon"></i>編集する</a></p>
            <p class="link"><a href="{{ route('mypage/delete') }}"><i class="fas fa-door-closed icon"></i>退会する</a></p>
        </div>
        <div class="col-md-8">
            <h2>いいね一覧</h2>
            <div class="row">
                @if($goods->isEmpty())
                    <p class="message">現在、いいねした投稿はありません</p>
                @else
                @foreach($goods as $good)
                <div class="col-md-4">
                    <div class="card post-card">
                        <div class="card-header"><a href="{{ route('post/detail',['id' => $good->post_id]) }}">{{ $good->title }}</a></div>
                        <div class="text-center">
                            <div class="card-body">
                                <a href="{{ route('post/detail',['id' => $good->post_id]) }}"><img src="{{ Storage::url($good->image) }}" alt="" class="img-fluid image"></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>投稿者：{{ $good->name }}</p>
                            <p>{{ $good->created_at }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-8 offset-4">{{ $goods->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
