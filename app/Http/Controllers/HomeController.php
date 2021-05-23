<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sport;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $eventsNumber = Event::all()->count();
        $sportsNumber = Sport::all()->count();
        $homeInfo = [
            'eventCount' => $eventsNumber,
            'sportCount' => $sportsNumber];

        return view('pages.home', ['homeInfo' => $homeInfo]);
    }
}
