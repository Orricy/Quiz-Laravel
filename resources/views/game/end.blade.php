@extends('layouts.app')

@section('content')
    <div class="row">
        <div id="user" class="col-md-4">
            <div class="col-md-12">
                <h2 id="user-name" class="text-center">{{ $user->name }}</h2>
            </div>
            <div class="col-md-12">
                <p id="user-level" class="text-center">Niveau {{ $level['lvl'] }}</p>
                <div id="user-gauge" class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $level['exp'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $level['exp'] }}%;">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h5 id="user-points" class="text-center">{{ $score }} Points</h5>
                <small id="points-mention" class="text-center">d'éxperience totale acquise</small>
            </div>
            <div id="trophies" class="col-md-12 text-center">
                @if($score == $total * 10)
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{ asset('img/troph_platinium.png') }}" class="img-responsive" alt="yeah 10 sur 10">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('img/troph_perfect.png') }}" class="img-responsive" alt="yeah 10 sur 10">
                    </div>
                @endif
                @if($score == ($total * 10) - 10)
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{ asset('img/troph_gold.png') }}" class="img-responsive" alt="yeah 9 sur 10">
                    </div>
                @endif
                @if($score == ($total * 10) - 30)
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{ asset('img/troph_silver.png') }}" class="img-responsive" alt="yeah 7 sur 10">
                    </div>
                @endif
                @if($score == ($total * 10) - 50)
                    <div class="col-md-8 col-md-offset-2">
                        <img src="{{ asset('img/troph_bronze.png') }}" class="img-responsive" alt="yeah 5 sur 10">
                    </div>
                @endif
                @if($score == 0)
                    <div class="col-md-4">
                        <img src="{{ asset('img/troph_failure.png') }}" class="img-responsive" alt="loser">
                    </div>
                @endif
                @if(true)
                    <div class="col-md-4">
                        <img src="{{ asset('img/troph_time.png') }}"" class="img-responsive" alt="quick enough (less than 1 minute)">
                    </div>
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
