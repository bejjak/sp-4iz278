<?php

namespace App\Http\Controllers;

use App\Models\Sport;

/**
 * Class SportController - Handles actions with sports
 * @package App\Http\Controllers
 */
class SportController extends Controller {
    /**
     * Shows sports
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $sports = Sport::all();
        return view('pages.sports', ['sports' => $sports]);
    }

    /**
     * Will make a sport favorite or remove sport from user favorites if already there
     * @param Sport $sport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function favoriteSport(Sport $sport) {
        // will add relation or remove it if already present -> function toggle
        auth()->user()->favoriteSports()->toggle($sport->sport_id);
        return back();
    }
}
