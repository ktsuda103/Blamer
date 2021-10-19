@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card mb-5">
                <div class="card-header">
                    {{ $post->title }}
                    <hr color="white">
                    <div class="text-right">
                        <p>投稿者：{{ $post->name }}</p>
                        <p>投稿日時：{{ $post->post_create }}</p>
                        <p>
                            @auth
                                @if($good === null)
                                    <form method="post" action="{{ route('good/store') }}">
                                    @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="submit" value="&#xf004;" class="far black-heart">
                                    </form>
                                @else
                                    <form method="post" action="{{ route('good/delete') }}">
                                    @csrf
                                        <input type="hidden" name="good_id" value="{{ $good->id }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="submit" value="&#xf004;" class="fas heart">
                                    </form>
                                @endif
                            @endauth
                        </p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p class="large">投稿内容</p><hr color="white">   
                    {{ $post->comment }}
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if($comments->isEmpty())
                    <p>コメントはまだありません</p>
                    @else
                        @foreach($comments as $comment)    
                        <div class="row">
                            @if(isset($best_comment))
                                @if($comment->comment_id === $best_comment->comment_id)
                                <div class="col-12 star">
                                    <i class="fas fa-star"></i>ベストコメントに選ばれました！
                                </div>
                                @endif
                            @endif
                            <div class="col-md-4">
                                投稿者：{{ $comment->name }}
                            </div>
                            <div class="offset-md-4 col-md-4">
                                {{ $comment->comment_create }}
                            </div>
                            <div class="col-md-8 comment">{{ $comment->comment }}</div>
                            <div class="col-md-4">
                                @if($post->user_id === \Auth::id() && $comment->user_id !== \Auth::id())
                                    @if($best_comment === null)
                                        <form method="post" action="{{ route('best_comment/store') }}" class="form-inline">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="comment_id" value="{{ $comment->comment_id }}">
                                            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                                            <button type="submit" class="btn btn-info">ベストコメントに選ぶ</button>
                                        </form>
                                    @elseif($best_comment->comment_id === $comment->comment_id)
                                    <form method="post" action="{{ route('best_comment/delete') }}" class="form-inline">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" name="best_comment_id" value="{{ $best_comment->id }}">
                                        <button type="submit" class="btn btn-secondary">ベストコメントを解除</button>
                                    </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    @guest
                        <p>コメントするにはログインが必要です。</p>
                    @else
                    <form method="post" action="{{ route('comment/store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                            <input type="submit" value="送信" class="btn btn-primary">
                        </div>
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
