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
                        </div>

                        <div class="form-group row">
                            <div class="offset-1 col-3">
                                <a href="{{ route('contact/index') }}" class="btn btn-info"><戻る</a> 
                            </div>
                           
                            <div class="col-2 offset-6">
                                <button type="submit" class="btn btn-primary">
                                    送信>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
