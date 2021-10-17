@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{$user['name']}}のページ</h1>
            <p>現在のポイント数：{{ number_format($point['point']) }}ポイント</p>
            <p>ベストコメント数：{{ $best_comment }}件</p>
            <p><a href="">いいね一覧</a></p>
            <p><a href="">編集する</a></p>
            <p><a href="">退会する</a></p>
        </div>

    </div>
</div>
@endsection
