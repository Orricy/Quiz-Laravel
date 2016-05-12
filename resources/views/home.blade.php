@extends('layouts.app')

@section('content')
<div class="panel-heading">
    <h2 class="text-center">{{ $quiz->title }}</h2>
</div>

<div class="panel-body">
    <div class="col-md-2 col-md-offset-5">
        <a class="btn btn-block btn-primary" href="{{ route('home.game', $quiz->id) }}" role="button">Link</a>
    </div>
</div>
@endsection
