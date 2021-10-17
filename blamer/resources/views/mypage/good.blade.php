@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{$user['name']}}のページ</h1>
            <p>現在のポイント数：{{ number_format($point['point']) }}ポイント</p>
            <p>ベストコメント数：{{ $best_comment }}件</p>
            <p><a href="{{ route('mypage/index') }}">マイページ</a></p>
            <p><a href="">編集する</a></p>
            <p><a href="">退会する</a></p>
        </div>
        <div class="col-md-8">
            <h2>いいね一覧</h2>
            <div class="row">
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
            </div>
        </div>
    </div>
</div>
@endsection
