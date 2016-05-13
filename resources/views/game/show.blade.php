@extends('layouts.app')

@section('content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <h2 class="text-center">{{$quiz->title}}</h2>

        <div class="row question">

                <div class="col-md-12">
                    <h3 class="text-center">
                        {{ $question->title}} |
                    </h3>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-block btn-primary" href="{{ route('home.game', [$quiz->id, $questionNb + 1]) }}" role="button">NEXT</a>
                </div>
                <div class="col-md-12">
                    <div class="row answer">
                        <div class="col-md-3 col-md-offset-3">
                            @if($question->right_answer === 1)
                                <button type="button" class="btn btn-block btn-success">{{ $question->answer_1}}</button>
                            @else
                                <button type="button" class="btn btn-block btn-default">{{ $question->answer_1}}</button>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if($question->right_answer === 2)
                                <button type="button" class="btn btn-block btn-success">{{ $question->answer_2}}</button>
                            @else
                                <button type="button" class="btn btn-block btn-default">{{ $question->answer_2}}</button>
                            @endif
                        </div>
                    </div>
                    <div class="row answer">
                        <div class="col-md-3 col-md-offset-3">
                            @if($question->right_answer === 3)
                                <button type="button" class="btn btn-block btn-success">{{ $question->answer_3}}</button>
                            @else
                                <button type="button" class="btn btn-block btn-default">{{ $question->answer_3}}</button>
                            @endif
                        </div>
                        <div class="col-md-3">
                            @if($question->right_answer === 4)
                                <button type="button" class="btn btn-block btn-success">{{ $question->answer_4}}</button>
                            @else
                                <button type="button" class="btn btn-block btn-default">{{ $question->answer_4}}</button>
                            @endif
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
