@extends('layouts.app')

@section('content')
    <div class="panel-heading">
        <h2 class="text-center">Top Week</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                @foreach($scores as $score)
                    <div class="col-md-10">
                        <p class="text-left">{{ $score->user->name }}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-right">{{ $score->value }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
