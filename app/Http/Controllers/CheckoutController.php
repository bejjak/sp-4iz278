<?php

namespace App\Http\Controllers;

use App\Models\Event;

class CheckoutController extends Controller {
    public function index($total) {
        $totalPrice = number_format($total, 2, ',', ' ');
        return view('pages.checkout', ['total' => $totalPrice]);
    }

    public function decreaseCapacity(Event $event) {

    }
}
