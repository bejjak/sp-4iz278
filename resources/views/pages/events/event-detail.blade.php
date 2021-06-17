@extends('layouts.master')

@section('content')
    <h1 class="text-center fw-bold mt-2 mb-3">{{$event->event_name}}</h1>

    <div class="d-flex flex-column align-items-center content flex-grow-1 me-4 ms-4">
        <div class="d-flex justify-content-center align-items-center mb-4 flex-wrap w-100">
            @can('update', $event)
                <div class="col-md-3 d-flex justify-content-end">
                    <a href="{{route('event.edit', $event->event_id)}}" class="btn btn-warning event-button"><i class="fas fa-edit me-2"></i>Edit</a>
                </div>
            @endcan
            <div class="ms-5 me-5 d-flex justify-content-center">
                <img style="width: 200px;" class="br-10 bg-info" src="{{$event->img}}" alt="{{$event->event_name}} image">
            </div>
            @can('delete', $event)
                <div class="col-md-3 d-flex justify-content-start">
                    <form action="{{route('event.delete', $event->event_id)}}" method="POST">
                        @csrf
                        <button type="submit" onclick="return confirm('Do you really want to delete this event?')" class="event-button btn btn-danger"><i class="fas fa-trash-alt me-2"></i>Delete</button>
                    </form>
                </div>
            @endcan
        </div>

        <div class="bg-secondary text-white pt-4 pb-4 w-75 d-flex flex-column align-items-center br-10">
            <div class="d-flex justify-content-between w-75 flex-wrap">
                <span class="me-2 text-start fw-bold">Start date:</span>
                <span class="text-end">{{$event->formatDate($event->start_date)}}</span>
            </div>
            @if($event->end_date)
                <div class="d-flex justify-content-between w-75 flex-wrap">
                    <span class="me-2 text-start fw-bold">End date:</span>
                    <span class="text-end">{{$event->formatDate($event->end_date)}}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between w-75 flex-wrap">
                <span class="me-2 text-start fw-bold">Sport:</span>
                <span class="text-end">{{$event->sport->sport_name}}</span>
            </div>
            @if($event->competition)
                <div class="d-flex justify-content-between w-75 flex-wrap">
                    <span class="me-2 text-start fw-bold">Competition:</span>
                    <span class="text-end">{{$event->competition}}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between w-75 flex-wrap">
                <span class="me-2 text-start fw-bold">Capacity:</span>
                <span class="text-end">{{$event->capacity}}</span>
            </div>
            <div class="d-flex justify-content-between w-75 flex-wrap">
                <span class="me-2 text-start fw-bold">Price:</span>
                <span class="text-end">{{$event->formatPrice($event->price)}} CZK</span>
            </div>
            @if($event->place)
                <div class="d-flex justify-content-between w-75 flex-wrap">
                    <span class="me-2 text-start fw-bold">Place:</span>
                    <span class="text-end">{{$event->place->place_name}}</span>
                </div>
                <div class="d-flex justify-content-between w-75 flex-wrap">
                    <span class="me-2 text-start fw-bold">City:</span>
                    <span class="text-end">{{$event->place->city}}</span>
                </div>
                @if($event->place->country)
                    <div class="d-flex justify-content-between w-75 flex-wrap">
                        <span class="me-2 text-start fw-bold">Country:</span>
                        <span class="text-end">{{$event->place->country}}</span>
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
            @if(auth()->check())
            <a class="btn btn-outline-primary" href="{{route('buy', $event->event_id)}}">
                Add to Cart
            </a>
            @endif
        </div>
    </div>
@endsection
