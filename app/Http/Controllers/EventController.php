<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller {
    public function index() {
        $events = Event::paginate(6);
        return view('pages.events-offer', ['events' => $events]);
    }

    public function showDetail($id) {
        $event = Event::find($id);
        return view('pages.event-detail', ['event' => $event]);
    }
}
