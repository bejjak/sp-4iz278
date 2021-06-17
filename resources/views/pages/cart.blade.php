@extends('layouts.master')

@section('content')
    <h1 class="text-center fw-bold mt-2 mb-3">Shopping Cart</h1>

    <div class="container mt-2">
        @if(count($events) == 0)
            <h3 class="text-center">No tickets selected yet</h3>
            <hr>
            <div class="d-flex justify-content-center align-items-center mb-3 flex-wrap">
                <a class="btn btn-outline-dark m-1" href="{{route('events')}}">
                    <i class="fas fa-cart-plus me-1"></i>
                    Go Shopping</a>
                <a class="btn btn-outline-dark m-1" href="{{route('home')}}">
                    <i class="fas fa-home me-1"></i>
                    Go Home
                </a>
                <a class="btn btn-outline-dark m-1" href="{{route('profile')}}">
                    <i class="fas fa-user-circle me-1"></i>
                    See Profile</a>
            </div>
        @else
            <h3 class="text-center">Selected tickets</h3>
            <hr>

            @foreach($events as $event)
                <div class="d-flex cart-item justify-content-around align-items-center flex-wrap mb-3 rounded" style="background-color: #709cd866">
                    @include('components.cart-event')
                    <div class="d-flex justify-content-evenly align-items-center pt-2 pb-2 flex-grow-1 flex-wrap">
                        <div class="spinner d-flex m-2">
                            <div class="down bg-dark text-white" onclick="itemCartDown(this, {{$event->price}}, {{$event->event_id}})"><i class="fas fa-minus"></i></div>
                            <input class="spinner-number" type="number" min="1" max="{{$event->capacity}}" value="{{$event->quantity}}">
                            <div class="up bg-dark text-white" onclick="itemCartUp(this, {{$event->price}}, {{$event->event_id}})"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="m-2"><a href="{{route('remove', $event->event_id)}}"><i class="display-4 text-danger far fa-times-circle"></i></a></div>
                    </div>
                </div>
            @endforeach

            <p class="text-center display-4 fw-bold">
                Total price: <span id="total-price">{{$event->formatPrice($total)}}</span> CZK
            </p>


            <div class="d-flex justify-content-center mb-4 mt-3">
                <a class="btn btn-danger"
                        onclick="return confirm('Are you sure? This will remove all items from cart.')"
                        href="{{route('cart.empty')}}">
                    <i class="fas fa-trash-alt me-2"></i>Empty Cart
                </a>
            </div>

            <hr>
            <div class="d-flex justify-content-center align-items-center mb-3 flex-wrap">
                <a class="btn btn-outline-dark me-2 ms-2 mb-2" href="{{route('events')}}">
                    <i class="fas fa-cart-plus me-1"></i>
                    Go Shopping
                </a>
                <a class="btn btn-outline-dark me-2 ms-2 mb-2" href="{{route('checkout', $total)}}">
                    <i class="far fa-credit-card me-2"></i>
                    Go To Checkout
                </a>
            </div>
        @endif
    </div>
@endsection
