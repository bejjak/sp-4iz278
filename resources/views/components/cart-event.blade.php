<div class="cart-card card bg-info text-white" style="max-width: 540px;">
    <div class="d-flex flex-wrap no-gutters card-upper justify-content-center">
        <div class="d-flex m-2" style="max-width: 8rem">
            <div class="image-container d-flex">
                <img data-src="{{$event->img}}" class="card-img lazyload" alt="{{$event->event_name}}">
            </div>
        </div>
        <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title cart-event-title text-center pb-2">{{$event->event_name}}</h5>
                <p class="card-text text-center mb-0 fw-bold">{{$event->formatPrice($event->price)}} CZK / ks</p>
            </div>
        </div>
    </div>
</div>


