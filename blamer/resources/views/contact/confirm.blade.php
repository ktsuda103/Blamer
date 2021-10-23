@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ内容確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact/send') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        <input type="hidden" name="category" value="{{ $contact['category'] }}">
                        <input type="hidden" name="content" value="{{ $contact['content'] }}">
                        <div class="row">
                            <label for="email" class="col-md-3 text-md-right">メールアドレス:</label>
                            <div class="col-md-9">
                                {{ $contact['email'] }}
                            </div>
                        </div>
                        <div class="row">
                            <label for="category" class="col-md-3 text-md-right">カテゴリー:</label>

                            <div class="col-md-9">
                                {{ $contact['category'] }}
                            </div>
                        </div>
                        <div class="row">
                            <label for="content" class="col-md-3 text-md-right">お問い合わせ内容:</label>
                                <div class="col-md-9">
                                    {{ $contact['content'] }}
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-5 mb-3">送信する</button>
                        <a href="{{ route('contact/index') }}" class="d-block ml-5">前のページへ戻る</a>     
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
