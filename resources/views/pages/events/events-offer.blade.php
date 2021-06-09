@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center fw mt-2 mb-3">Events Offer</h1>

        @can('create', \App\Models\Event::class)
            <div class="d-flex justify-content-center mb-3">
                <a href="{{route('event.create')}}" class="btn btn-outline-success"><i class="fas fa-plus me-2"></i>Create new event</a>
            </div>
        @endcan

        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex justify-content-center align-items-end col-md-4">
                {{ $events->links() }}
            </div>

            <div class="d-flex col-md-4 justify-content-end">
                <div>
                    <label for="sort-by">Sort By</label>
                    <select id="sort-by" onchange="changeSortBy(this.value)" name="sort-by" class="form-select" aria-label="Default select example">
                        <option selected>Choose value</option>
                        <option value="event_id" data-sorting_type="asc" id="id-sort">Default</option>
                        <option value="price" data-sorting_type="asc" id="price-sort">Price</option>
                        <option value="event_name" data-sorting_type="asc" id="alpha-sort">Event Name</option>
                    </select>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <label for="sort-order">Sort Order</label>
                    <a onclick="changeSortOrder()" id="sort-order" class="btn btn-primary text-white" data-sort="asc">
                        <i class="fas fa-sort-amount-up" id="sort-order-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs justify-content-center" id="sportsTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Football</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Basketball</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

        </div>

        <div class="d-flex flex-wrap justify-content-center mb-3 mt-2" id="events-group-wrapper">
            @include('components.events-group')
        </div>

        <div class="d-flex justify-content-center mb-3">
            {{ $events->links() }}
        </div>
    </div>
@endsection
