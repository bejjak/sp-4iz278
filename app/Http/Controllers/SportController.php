<?php

namespace App\Http\Controllers;

use App\Models\Sport;

class SportController extends Controller {
    public function index() {
        $sports = Sport::all();
        return view('pages.sports', ['sports' => $sports]);
    }

    public function favoriteSport(Sport $sport) {
        auth()->user()->favoriteSports()->attach($sport->sport_id);
    }

    public function unfavoriteSport(Sport $sport) {
        auth()->user()->favoriteSports()->detach($sport->sport_id);
    }
}
