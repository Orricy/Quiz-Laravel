@extends('layouts.app')

@section('content')
    <div class="row">
        <div id="user" class="col-md-4">
            <div class="col-md-12">
                <h2 id="user-name" class="text-center">{{ $user->name }}</h2>
            </div>
            <div class="col-md-12">
                <h5 id="user-level">{{ $user->experience }}</h5>
            </div>
            <div class="col-md-12">
                <div id="user-gauge" class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $user->experience }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $user->experience }}%;">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h5 id="user-points" class="text-center">{{ $score }} Points</h5>
                <small id="points-mention" class="text-center">d'éxperience totale acquise</small>
            </div>
            <div class="col-md-12 text-center">
                @if($score == $total * 10)
                    <img src="#" alt="yeah 10 sur 10">
                @endif
                @if($score == ($total * 10) - 10)
                    <img src="#" alt="yeah 9 sur 10">
                @endif
                @if($score == ($total * 10) - 30)
                    <img src="#" alt="yeah 7 sur 10">
                @endif
                @if($score == ($total * 10) - 50)
                    <img src="#" alt="yeah 5 sur 10">
                @endif
                @if($score == 0)
                    <img src="#" alt="loser">
                @endif
                @if(true)
                    <img src="#" alt="quick enough (less than 1 minute)">
                @endif
            </div>
            {{ $quiz->title }}
        </div>
        <div class="col-md-8">
            <div id="user-score" class="col-md-12">
                <div class="col-md-12">
                    <h4 id="user-exp" class="text-center">{{ $user->experience }} points</h4>
                    <small class="text-center">de score total</small>
                </div>
            </div>
        </div>
    </div>
@endsection
