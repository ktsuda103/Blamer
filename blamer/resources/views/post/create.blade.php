@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    投稿画面
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('post/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-7">
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <div class="error">
                                        <p>{{ $errors->first('title') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-3 text-md-right">画像</label>
                            <div class="custom-file col-md-7">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label for="image" class="custom-file-label">選択してください</label>
                                @if($errors->has('image'))
                                    <div class="error">
                                        <p>{{ $errors->first('image') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comment" class="col-md-3 col-form-label text-md-right">投稿内容</label>
                            <div class="col-md-7">
                                <textarea rows="10" cols="50" name="comment" id="comment" class="form-control" value="{{ old('comment') }}"></textarea>
                                @if($errors->has('comment'))
                                    <div class="error">
                                        <p>{{ $errors->first('comment') }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 offset-3">
                                <button type="submit" class="btn btn-primary">投稿する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
