@extends('layouts.app')

@section('circful')
    <link href="{{ asset('css/jquery.circliful.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="panel-body question-content">
        <h2 class="text-center">{{$quiz->title}}</h2>
        <div id="score" class="col-md-3">
            <div class="col-md-12">
                Score
            </div>
            <div class="col-md-12">
                {{ $score }}
            </div>
        </div>
        <div class="col-md-9">
            @for($i = 0; $i < $total; $i++)
                @if($i==$next)
                    <div id="on-question" class="question_number">
                        <div class="big-number">
                            {{ $i+1 }}
                        </div>
                    </div>
                    @unless($i+1 == $total)
                        <div class="line-question"></div>
                    @endunless
                @else
                    <div class="question_number">
                        <div class="small-number">
                            {{ $i+1 }}
                        </div>
                    </div>
                    @unless($i+1 == $total)
                        <div class="line-question"></div>
                    @endunless
                @endif
            @endfor
        </div>

        <div class="row question">
                <div class="col-md-12">
                    <h3 id="question-title" class="text-center">
                        {{ $question->title }}
                    </h3>
                </div>
                @if($errors)
                    <div class="col-md-12">
                        <div class="errors">
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <p class="error-log">{{$error}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div id="answer-form" class="col-md-12">
                    {{--
                    <a class="btn btn-block btn-primary" href="{{ route('home.game', [$quiz->id, $next + 1]) }}" role="button">NEXT</a>
                    --}}
                    {!! Form::open(array('url' => route('home.validation', [$quiz->id, $next + 1]), 'id' => 'userAnswer', 'method' => 'POST')) !!}
                    {!! Form::hidden('score', $score) !!}
                    <div class="row answer-row">
                        <div class="col-md-6">
                            {!! Form::radio('answer', 1, null, array('id' => 'first_answer',)) !!}
                            {{ Form::label('first_answer', $question->answer_1, ['class' => 'control-label']) }}
                        </div>
                        <div class="col-md-6">
                            {!! Form::radio('answer', 2, null, array('id' => 'second_answer',)) !!}
                            {{ Form::label('second_answer', $question->answer_2, ['class' => 'control-label']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div id="timer-border" class="center-block text-center">
                            <div class="col-md-2 col-md-offset-5">
                                <div id="test-circle">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row answer-row">
                        <div class="col-md-6">
                            {!! Form::radio('answer', 3, null, array('id' => 'third_answer',)) !!}
                            {{ Form::label('third_answer', $question->answer_3, ['class' => 'control-label']) }}
                        </div>
                        <div class="col-md-6">
                            {!! Form::radio('answer', 4, null, array('id' => 'fourth_answer',)) !!}
                            {{ Form::label('fourth_answer', $question->answer_4, ['class' => 'control-label']) }}
                        </div>
                    </div>
                    {!! Form::submit('Envoyer', array('class' => 'form-control btn btn-primary')) !!}
                    {!! Form::close() !!}
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

@section('timer')
    <script src="{{ asset('js/timer.js') }}"></script>
    <script src="{{ asset('js/jquery.circliful.js') }}"></script>
@endsection
