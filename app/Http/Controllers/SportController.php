<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Will make a sport favorite or remove sport from user favorites if already there
     * @param Sport $sport
     * @return \Illuminate\Http\RedirectResponse
     */
    public function favoriteSportProfile(Sport $sport) {
        // will add relation or remove it if already present -> function toggle
        auth()->user()->favoriteSports()->toggle($sport->sport_id);

        $lastId = $sport->sport_id;

        $ids = [];
        foreach(auth()->user()->favoriteSports as $favorite) {
            array_push($ids, $favorite->sport_id);
        }

        $message = in_array($sport->sport_id, $ids)
            ? ['status' => 0, 'msg' => 'You have succesfully reverted this action. ' . ucfirst($sport->sport_name) . ' is back in favorites.', 'lastId' => $lastId]
            : ['status' => 1, 'msg' => 'You have succesfully removed ' . $sport->sport_name . ' from favorites.', 'lastId' => $lastId];


        return redirect()->route('profile')->with('message', $message);
    }

    public function createSport(Request $request) {
        $validator = Validator::make($request->all(), [
            'new-name' => 'required|max:255',
            'new-img' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->post('new-name');
        $img = $request->post('new-img');

        $updated = [
            'sport_name' => $name,
            'img' => $img,
        ];

        try {
            Sport::create($updated);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'The create cannot be made! Try it again.')->withInput();
        }

        return redirect()->back()->with('success', 'The sport was successfully created')->withInput();
    }

    public function updateSport($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'img' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'The update has failed! Try it again.')->withInput();
        }

        $name = $request->post('name');
        $img = $request->post('img');

        $updated = [
            'sport_name' => $name,
            'img' => $img,
        ];

        try {
            $sport = Sport::find($id);
            $sport->update($updated);
            $sport->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'The update has failed! Try it again.')->withInput();
        }

        return redirect()->back()->with('success', 'The record was successfully updated')->withInput();
    }

    public function deleteSport($id) {
        $sport = Sport::find($id);

        try {
            $sport->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            //SQLSTATE[23000]: Integrity constraint violation
            return redirect()->back()->with('error', 'The record cannot be deleted. Integrity constraint violation')->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'The record cannot be deleted.')->withInput();
        }

        return redirect()->back()->with('success', 'The record was successfully deleted')->withInput();
    }
}
