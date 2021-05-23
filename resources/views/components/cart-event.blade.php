<div class="cart-card card mb-3 bg-info text-white" style="max-width: 540px;">
    <div class="d-flex flex-nowrap no-gutters card-upper">
        <div class="col-md-4 mt-2 ms-2 mb-2">
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


