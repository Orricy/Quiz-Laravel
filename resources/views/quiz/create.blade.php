@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <h1>Formulaire</h1>
        {!! Form::open(array('url' => route('quiz.store'), 'method' => 'POST')) !!}
        {{-- Form::select('user_id', $users, null, array('class' => 'form-control')) --}}
        <br>
        {!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'L\'intituté du quiz')) !!}
        <br>
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
@endsection
