@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                    <div class="row">
                        <div class="col-md-4">
                            投稿者：
                        </div>
                        <div class="offset-md-4 col-md-4">
                            投稿日時：
                        </div>
                        <div class="col-12">
                            コメント
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @guest
                        <p>コメントするにはログインが必要です。</p>
                    @else
                    <form method="post" action="">
                        @csrf
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
