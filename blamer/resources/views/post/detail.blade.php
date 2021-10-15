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
            <div class="card mb-5">
                <div class="card-header">
                    {{ $post->title }}
                    <div class="text-right">
                        <p>投稿者：{{ $post->name }}</p>
                        <p>投稿日時：{{ $post->post_create }}</p>
                    </div>
                </div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p class="large">投稿内容</p>
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
                            <div class="col-md-4">
                                投稿者：{{ $comment->name }}
                            </div>
                            <div class="offset-md-4 col-md-4">
                                {{ $comment->comment_create }}
                            </div>
                            <div class="col-12 comment">{{ $comment->comment }}</div>
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
