@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
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
    </div>
</div>
@endsection
