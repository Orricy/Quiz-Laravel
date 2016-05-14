@extends('layouts.app')

@section('content')
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <h2 class="text-center">{{ $pos }} | {{$myUser->name}} | {{ $myUser->experience }}</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach($users as $user)
                    <div class="col-md-10">
                        <p class="text-left">{{ $user->name }}</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-right">{{ $user->experience }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
