@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
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
            <p class="link"><a href="{{ route('mypage/index') }}"><i class="fas fa-user icon"></i>マイページ</a></p>
            <p class="link"><a href="{{ route('mypage/edit') }}"><i class="fas fa-user-edit icon"></i>編集する</a></p>
            <p class="link"><a data-toggle="modal" data-target="#delete-modal"><i class="fas fa-door-closed icon"></i>退会する</a></p>
            <div class="modal" id="delete-modal" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>退会確認画面</h4>
                        </div>
                        <div class="modal-body">
                            <label>退会しますか？</label>
                            <p class="caution">※退会するとこれまでの投稿・コメントは削除されます。</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                            <form action="{{ route('mypage/delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-secondary">退会する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                <a href="{{ route('post/detail',['id' => $good->post_id]) }}"><img src="{{ Storage::disk('s3')->url("$good->image") }}" alt="" class="img-fluid image"></a>
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
