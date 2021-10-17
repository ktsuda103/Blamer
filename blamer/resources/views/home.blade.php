@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1>Blamer</h1>
                        <p>スーパーやコンビニでついつい余計なものを買ってしまう。あなたにはこんな経験ありませんか？</p>
                        <p>Blamerは意志の弱いあなたをサポートするアプリです。</p>
                        <p>早速投稿してみましょう！</p>
                        <p>チュートリアルは<a href="#">こちら</a></p>
                    </div>
                </div>
            </div>
        </div>
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
                    <p>投稿日時：{{ $post->post_create }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
