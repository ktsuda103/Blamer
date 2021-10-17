@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{$user['name']}}のページ</h1>
            <p>現在のポイント数:{{ $point['point'] }}</p>
        </div>

    </div>
</div>
@endsection
