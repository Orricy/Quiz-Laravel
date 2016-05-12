@extends('layouts.app')

@section('content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('url' => route('quiz.updateQuestion', $question->id), 'method' => 'PUT')) !!}
                {!! Form::text('title', $question->title, array('class' => 'form-control', 'placeholder' => 'Votre question')) !!}
                {!! Form::textarea('answer_1', $question->answer_1, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 1')) !!}
                {!! Form::textarea('answer_2', $question->answer_2, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 2')) !!}
                {!! Form::textarea('answer_3', $question->answer_3, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 3')) !!}
                {!! Form::textarea('answer_4', $question->answer_4, array('class' => 'form-control', 'rows' => 2, 'placeholder' => 'La réponse 4')) !!}
                {!! Form::selectRange('right_answer', 1, 4, $question->right_answer) !!}
                {!! Form::submit('Envoyer', array('class' => 'form-control btn btn-primary')) !!}
                {!! Form::close() !!}
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
            </div>
        </div>
    </div>
@endsection
