@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card heading">
                <div class="card-body sentense">
                    @auth
                    <h2>あなたの現在のランク</h2>
                    <p><i class="fas fa-crown mr-2"></i>
                        @if($point['point'] >= 30000)
                            神
                        @elseif($point['point'] >= 10000)
                            King of Blamer
                        @elseif($point['point'] >= 5000)
                            上級Blamer
                        @elseif($point['point'] >= 2000)
                            中級Blamer
                        @elseif($point['point'] >= 500)
                            初級Blamer
                        @elseif($point['point'] > 0)
                            駆け出しBlamer
                        @else
                            入門
                        @endif</p>
                    @endauth
                    <h2>ポイントの貯め方</h2>
                    <ul>
                        <li>投稿する！　→　30ポイントゲット！</li>
                        <li>コメントする！　→　50ポイントゲット！</li>
                        <li>ベストコメントに選ばれる！　→　100ポイントゲット！</li>
                    </ul>
                    <h2>ランク一覧</h2>
                    <ul>
                        <li>0点：入門</li>
                        <li>1〜499点：駆け出しBlamer</li>
                        <li>500〜1,999点：初級Blamer</li>
                        <li>2,000〜4,999点：中級Blamer</li>
                        <li>5,000〜9,999点：上級Blamer</li>
                        <li>10,000〜29,999点：king of Blamer</li>
                        <li>30,000点〜：神</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
