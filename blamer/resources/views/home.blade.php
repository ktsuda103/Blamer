@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="app-name">Blamer</h1>
                        <div class="sentense">
                            <p class="sentense">スーパーやコンビニでついつい余計なものを買ってしまう。あなたにはこんな経験ありませんか？</p>
                            <p>Blamerは意志の弱いあなたをサポートするアプリです。</p>
                            <a href="{{ route('post/create') }}">早速投稿してみましょう！</a>
                        </div>
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
                        <a href="{{ route('post/detail',['id' => $post->id]) }}"><img src="{{ Storage::url($post->image) }}" alt="" class="img-fluid image"></a>
                    </div>
                </div>
                <div class="card-footer">
                    <p>投稿者：{{ $post->name }}</p>
                    <p>投稿日時：{{ $post->post_create }}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-7 offset-5">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
