@extends('layouts.app')

@section('content')
<div class="panel-heading">
    @if($quiz)
        <h2 class="text-center">{{ $quiz->title }}</h2>
    @else
        <h2 class="text-center">Quiz</h2>
    @endif
</div>

<div class="panel-body">
    <div class="col-md-2 col-md-offset-5">
        @if($quiz)
            <a class="btn btn-block btn-primary" href="{{ route('home.game', [$quiz->id, 0]) }}" role="button">Start</a>
        @else
            <p class="text-center">Il n'y a aucun quiz pour l'instant</p>
        @endif
        <!--<a class="btn btn-block btn-primary" href="{{-- route('home.game', [$quiz->id, $question[0]->id]) --}}" role="button">Link</a>-->
    </div>
</div>
@endsection
