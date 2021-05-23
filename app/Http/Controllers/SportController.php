<?php

namespace App\Http\Controllers;

use App\Models\Sport;

class SportController extends Controller {
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
