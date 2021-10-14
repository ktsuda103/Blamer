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
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p>投稿者：</p>
                    <p>投稿日時：{{ $post->created_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
