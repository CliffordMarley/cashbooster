<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Game;
use App\Models\Outcome;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{

    public function index(){
        //Select all games joined with outcomes on game.id = outcome.game
        $games = Outcome::from('outcomes AS out')->join('games AS g', 'g.id', '=', 'out.game')->get([
            'out.id',
            'g.game_name',
            'out.outcome',
            'out.roi'
        ]);

        return view('pages.games.list')->with([
            'title' => 'Game Play',
            'page' => 'List',
            'userdata' => Auth::user(),
            'groups' => Group::all(),
            'gameaplay'=> $games
        ]);
    }
    public function plays(Request $request, Game $game)
    {
        return view('pages.outcomes.list')->with([
            'title'=>'Game Play',
            'page'=>'List',
            'userdata'=>Auth::user()
        ]);
    }
}
