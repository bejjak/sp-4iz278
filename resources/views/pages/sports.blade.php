@extends('layouts.master')

@section('content')
    @include('components.register-sidebar')
    @include('components.login-sidebar')

    <h1 class="text-center font-weight-bold mt-2 mb-3">Sports</h1>

    <div class="container d-flex flex-column align-items-center">
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($sports as $sport)
                <div class="d-flex flex-column p-3">
                    <span class="font-weight-bold text-center">{{ucfirst($sport->sport_name)}}</span>
                    <div class="sport-image">
                        <img class="w-100" src="{{$sport->img}}" alt="{{$sport->sport_name}} image">
                    </div>
                    @if(auth()->check())
                        <a class="btn btn-primary mb-2" href="#">Favorite</a>
                        <a class="btn btn-danger" href="#">Unfavorite</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
