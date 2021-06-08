<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

/**
 * Class EventController - handles event related actions
 * @package App\Http\Controllers
 */
class EventController extends Controller {
    /**
     * Show events
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $events = Event::paginate(6);
        return view('pages.events-offer', ['events' => $events]);
    }

    /**
     * Get data sorted and ordered by some criteria
     * @param Request $request
     * @return string
     */
    public function fetchData(Request $request) {
        $sort_by = $request->get('by');
        $order = $request->get('order');
        $events = Event::query()->orderBy($sort_by, $order)->paginate(6);
        return view('components.events-group', ['events' => $events])->render();
    }

    /**
     * Shows event detail
     * @param $id - id of event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showDetail($id) {
        $event = Event::find($id);
        return view('pages.event-detail', ['event' => $event]);
    }
}
