@extends('layouts.master')

@section('content')
    @include('components.register-sidebar')
    @include('components.login-sidebar')

    <h1 class="text-center fw-bold mt-2 mb-3">Sports</h1>

    <div class="container d-flex flex-column align-items-center">
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($sports as $sport)
                <div class="d-flex flex-column p-3 me-4">
                    <h5 class="fw-bold text-center mb-0 pb-2 pt-2 bg-secondary text-white">{{ucfirst($sport->sport_name)}}</h5>
                    <div class="sport-image">
                        <img class="w-100 lazyload" data-src="{{$sport->img}}" alt="{{$sport->sport_name}} image">
                    </div>
                    @if(auth()->check())
                        <div class="d-flex w-100">
                            <button class="w-100 btn btn-primary mb-2 br-0" onclick="favoriteSport({{$sport->sport_id}})">
                                <i id="{{$sport->sport_id}}" class="fas {{auth()->user()->favoriteSports()->find($sport->sport_id) ? 'fa-thumbs-down' : 'fa-thumbs-up' }}"></i>
                            </button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
