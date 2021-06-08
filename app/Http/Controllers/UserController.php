<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController - Handles actions regarding user
 * @package App\Http\Controllers
 */
class UserController extends Controller {
    /**
     * Shows profile page with user data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show() {
        if (!auth()->check()) {
            return redirect()->route('/home');
        }

        $user = User::find(auth()->id());
        $userTickets = $user->tickets;
        $activeTickets = [];
        $historyTickets = [];
        foreach ($userTickets as $ticket) {
            $ticket->event->start_date >= Carbon::today() ? array_push($activeTickets, $ticket) : array_push($historyTickets, $ticket);
        }

        return view('pages.profile', ['user' => $user, 'activeTickets' => $activeTickets, 'historyTickets' => $historyTickets]);
    }
}
