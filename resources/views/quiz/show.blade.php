@extends('layouts.app')

@section('content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <h2 class="text-center">{{$quiz->title}}</h2>
        <a href="{{ route('quiz.edit', $quiz->id) }}">Editer</a>
        {{ Form::model($quiz, array('route' => array('quiz.destroy', $quiz->id), 'method' => 'DELETE',)) }}
        {!! Form::submit('×', array('class' => '')) !!}
        {{ Form::close() }}
        <div class="row">
            <div class="col-md-12">
                @if($errors)
                    <div class="errors">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <p class="error-log">{{$error}}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
                {!! Form::open(array('url' => route('quiz.storeQuestion', $quiz->id), 'method' => 'POST')) !!}
                {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Votre question')) !!}
                {!! Form::textarea('answer_1', null, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 1')) !!}
                {!! Form::textarea('answer_2', null, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 2')) !!}
                {!! Form::textarea('answer_3', null, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 3')) !!}
                {!! Form::textarea('answer_4', null, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 4')) !!}
                {!! Form::selectRange('right_answer', 1, 4) !!}
                {!! Form::submit('Envoyer', array('class' => 'form-control btn btn-primary')) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row question">
            @foreach($questions as $question)
                <div class="col-md-12">
                    <h3 class="text-center">
                        {{ $question->title}} |
                        <a href="{{ route('quiz.editQuestion', $question->id) }}">Editer</a>
                        {{ Form::model($question, array('route' => array('quiz.destroyQuestion', $question->id), 'method' => 'DELETE',)) }}
                        {!! Form::submit('×', array('class' => '')) !!}
                        {{ Form::close() }}
                    </h3>
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
            @endforeach
        </div>
    </div>
@endsection
