@extends('layouts.master')

@section('content')
    <h1 class="text-center fw-bold mt-2 mb-3">{{$event->event_name}}</h1>

    <div class="d-flex flex-column align-items-center content flex-grow-1">
        <img class="w-25 mb-4 br-10 bg-info" src="{{$event->img}}" alt="{{$event->event_name}} image">

        <div class="bg-secondary text-white pt-4 pb-4 w-50 d-flex flex-column align-items-center br-10">
            <div class="d-flex justify-content-between w-75">
                <span class="me-2">Start date:</span>
                <span>{{$event->formatDate($event->start_date)}}</span>
            </div>
            @if($event->end_date)
                <div class="d-flex justify-content-between w-75">
                    <span class="me-2">End date:</span>
                    <span>{{$event->formatDate($event->end_date)}}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between w-75">
                <span class="me-2">Sport:</span>
                <span>{{$event->sport->sport_name}}</span>
            </div>
            @if($event->competition)
                <div class="d-flex justify-content-between w-75">
                    <span class="me-2">Competition:</span>
                    <span>{{$event->competition}}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between w-75">
                <span class="me-2">Capacity:</span>
                <span>{{$event->capacity}}</span>
            </div>
            <div class="d-flex justify-content-between w-75">
                <span class="me-2">Price:</span>
                <span>{{$event->formatPrice($event->price)}} CZK</span>
            </div>
            @if($event->place)
                <div class="d-flex justify-content-between w-75">
                    <span class="me-2">Place:</span>
                    <span>{{$event->place->place_name}}</span>
                </div>
                <div class="d-flex justify-content-between w-75">
                    <span class="me-2">City:</span>
                    <span>{{$event->place->city}}</span>
                </div>
                @if($event->place->country)
                    <div class="d-flex justify-content-between w-75">
                        <span class="me-2">Country:</span>
                        <span>{{$event->place->country}}</span>
                    </div>
                @endif
            @endif
            @if($event->description)
                <hr>
                <div class="d-flex ps-3 pe-3">
                    <p class="text-justify">{{$event->description}}</p>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center align-items-center mt-4 mb-4">
            <a class="btn btn-outline-dark me-2" href="{{route('events')}}">
                <i class="fas fa-arrow-left"></i>
                Go Back
            </a>
            <a class="btn btn-outline-primary" href="{{route('buy', $event->event_id)}}">
                Buy
            </a>
        </div>
    </div>
@endsection
