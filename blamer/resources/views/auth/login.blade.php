@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __('ログイン') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログイン状態を維持') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方はこちら') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card overview">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 col-6 section">
                            <h3>あなたにはこんな経験ありませんか？</h3>
                            <p>スーパーやコンビニでついつい無駄使いをしてしまう・・・。</p>
                            <p>セールの文字を見ると買ってしまう・・・。</p>
                            <p>ネットショッピングで衝動買いをしてしまう・・・。</p>
                        </div>
                        <div class="col-md-3 col-6 section">
                            <img src="{{ Storage::url('public/images/trouble_man_mono-1.png') }}" alt="" class="img-fluid">
                        </div>            
                        <div class="col-md-3 col-6 section">
                            <img src="{{ Storage::url('public/images/smartphone_woman_mono.png') }}" alt="" class="img-fluid">                      
                        </div>        
                        <div class="offset-md-2 col-md-7 col-5 section">
                            <h3>そんな時はBlamer！</h3>
                            <p>買い物をしたらレシートの写真を投稿してみましょう！</p>
                            <p>タイトルとひとことをつけてください。</p>
                        </div>    
                        <div class="col-md-8 col-6 section">
                            <h3>投稿へコメントしよう！</h3>
                            <p>無駄な買い物をしてしまう投稿にはみんなで非難してあげましょう！</p>
                            <p>なんでそんな物買ったんだ！</p>
                            <p>おいこのデブ！</p>
                            <p>あきれて何も言えません。etc.</p>
                        </div>        
                        <div class="col-md-3 col-6 section">
                            <img src="{{ Storage::url('public/images/angry_man_02_mono.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-6 section">
                            <img src="{{ Storage::url('public/images/medalist_woman_mono.png') }}" alt="" class="img-fluid">                      
                        </div>
                        <div class="offset-md-2 col-md-7 col-6 section">
                            <h3>ランクをあげよう！</h3>
                            <p>投稿やコメントをするとポイントが貯まってランクが上がります。</p>
                            <p>ポイントを貯めて神を目指しましょう！</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary mb-4" id="start-button">さっそく始める</button>
                        <p>会員登録がまだの方は<a href="{{ route('register') }}">こちら</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
