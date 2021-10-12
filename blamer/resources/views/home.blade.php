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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('タイトル') }}</div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p>投稿者：</p>
                    <p>投稿日時：</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('タイトル') }}</div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p>投稿者：</p>
                    <p>投稿日時：</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('タイトル') }}</div>
                <div class="text-center">
                    <div class="card-body">
                        <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="card-footer">
                    <p>投稿者：</p>
                    <p>投稿日時：</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
