@extends('layouts.master')

@section('content')
    @include('components.register-sidebar')
    @include('components.login-sidebar')

    <div class="container">
        <h1 class="text-center fw mt-2 mb-3">Events Offer</h1>

        <div class="d-flex justify-content-end mb-3">
            <div class="d-flex search-bar col-md-4">
                <div class="d-flex flex-column">
                    <label for="floatingInput">Search</label>
                    <div class="d-flex">
                        <input type="search" class="form-control" id="floatingInput">
                        <button type="button" class="btn btn-primary">
                            <i class="text-white fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-end col-md-4">
                {{ $events->links() }}
            </div>

            <div class="d-flex col-md-4 justify-content-end">
                <div>
                    <label for="sort-by">Sort By</label>
                    <select id="sort-by" class="form-select" aria-label="Default select example">
                        <option selected>Choose value</option>
                        <option value="1">Date</option>
                        <option value="2">Sport</option>
                        <option value="3">A-Z</option>
                    </select>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <label for="sort-order">Sort Order</label>
                    <a onclick="changeSortOrder()" id="sort-order" class="btn btn-primary text-white">
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

        <div class="d-flex flex-wrap justify-content-center mb-3 mt-2">
            @foreach($events as $event)
                @include('components.event')
            @endforeach
        </div>

        <div class="d-flex justify-content-center mb-3">
            {{ $events->links() }}
        </div>
    </div>
@endsection
