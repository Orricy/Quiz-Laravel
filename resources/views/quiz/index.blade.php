@extends('layouts.app')

@section('content')
    <div class="panel-heading">Les quizz</div>

    <div class="panel-body">
        Liste des Quiz
        <a href="{{ route('quiz.create') }}" class="btn btn-primary btn-lg btn-block" role="button">Créer un quiz</a>
        @foreach($quizz as $quiz)
            <h2>{{$quiz->title}}</h2>
            <a href="{{route('quiz.show', $quiz->id)}}">
                <button class="btn btn-info">
                    Voir l'article
                </button>
            </a>
            @if(Auth::check() && Auth::user()->is_admin == 1)
                <a href="{{route('quiz.edit', $quiz->id)}}">
                    <button class="btn btn-success">
                        Editer l'article
                    </button>
                </a>
                <span class="delete-article-btn">
            {{ Form::model($quiz, array('route' => array('quiz.destroy', $quiz->id), 'method' => 'DELETE',)) }}
                    {!! Form::submit('Supprimer', array('class' => 'btn btn-danger')) !!}
                    {{ Form::close() }}
            </span>
            @endif
        @endforeach
    </div>
@endsection