<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $eventIds = session()->get('cart');
        $events = [];
        $totalPrice = 0;

        if ($eventIds && count($eventIds)) {
            foreach ($eventIds as $id=>$value) {
                $event = Event::find($id);
                if ($event) {
                    $event->quantity = $value['quantity'];
                    $totalPrice += $value['quantity'] * $event->price;
                    array_push($events, $event);
                }
            }
        }

        return view('pages.cart', ['events' => $events, 'total' => $totalPrice]);
    }

    public function add($id) {
        $event = Event::find($id);
        if(!$event) {
            //todo not found event
        }

        $cart = session()->get('cart');
        $count = request()->get($id);

        if (!$cart) {
            $data = [
                $id => ['quantity' => $count]
            ];
            session()->put('cart', $data);
        }

        // increase event quantity case
        else if (isset($cart[$id])) {
            $cart[$id]['quantity']+= $count;
            session()->put('cart', $cart);
        }
        // if item not exist in cart then add to cart with quantity = 1
        else {
            $cart[$id] = [
                "quantity" => $count,
            ];
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }

    public function remove($id) {
        $event = Event::find($id);
        if(!$event) {
            //todo not found event
        }

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function changeEventNumber(Request $request) {
        $event_id = $request->post('event_id');
        $increase = $request->post('increase');

//        return $event_id;
        $cart = session()->get('cart');
        $event = Event::find($event_id);
        if (!$event) {
            return back();
        }

        // when increasing number
        if ($increase === 1) {
            ($cart[$event_id]['quantity'] < $event->capacity) && $cart[$event_id]['quantity']++;
        }
        else {
            // when decreasing number
            ($cart[$event_id]['quantity'] > 1) && $cart[$event_id]['quantity']--;
        }

        session()->put('cart', $cart);
        session()->save();
        return back();
    }
}
