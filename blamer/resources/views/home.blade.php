@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
