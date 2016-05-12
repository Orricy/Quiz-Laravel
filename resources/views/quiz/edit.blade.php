@extends('layouts.app')

@section('content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
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
                {!! Form::open(array('url' => route('quiz.update', $quiz->id), 'method' => 'PUT')) !!}
                {!! Form::text('title', $quiz->title, array('class' => 'form-control', 'placeholder' => 'L\'intitulé de votre quiz')) !!}
                {!! Form::submit('Envoyer', array('class' => 'form-control btn btn-primary')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
