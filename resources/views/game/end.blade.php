@extends('layouts.app')

@section('content')
    <div class="panel-heading">
        <h2 class="text-center">{{ $quiz->title }}</h2>
    </div>

    <div class="panel-body">
        <div class="col-md-2 col-md-offset-5">
            <h2 class="text-center">END</h2>
            <h3 class="text-center">{{ $score }}</h3>
        </div>
    </div>
@endsection
