<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $eventsNumber = Event::all()->count();
        $sportsNumber = Event::all()->count();
        $homeInfo = [
            'eventCount' => $eventsNumber,
            'sportCount' => $sportsNumber];

        return view('pages.home', ['homeInfo' => $homeInfo]);
    }
}
