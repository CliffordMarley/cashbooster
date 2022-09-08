<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Group;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;


class GamesController extends Controller
{

    public function index()
    {
        //Get and return all games

        $games = Game::all();
        return response()->json($games);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function play(Request $request)
    {
        try {



            if ($request->has('game') && $request->has('msisdn') && $request->has('stake') && $request->has('outcome')
            ) {

                //Check if balance is enough for game
                $balance = Transaction::where('msisdn', $request->msisdn)->sum('amount');
                if($balance < $request->stake){
                    return response()->json([
                        'status'=>'error',
                        'message'=>"Sorry, the account does not have sufficient balance for the selected stake!"
                    ]);
                }

                //Request payment information

                if (true) {
                    //Check in groups if there is a entry where participants is
                    //less than 5 and outcome = give outcome and stake = given stake
                    $group = Group::from('groups AS g')
                        ->join('players AS p', 'p.group_id', '=', 'g.group_id')
                        ->where('g.stake', '=', $request->stake)
                        ->where('g.outcome', '=', $request->outcome)
                        ->where('g.game', '=', $request->game)
                        ->where('g.number_of_participants', '<', 5)
                        ->where('p.msisdn', '!=', $request->msisdn)->first();

                    $group_id = null;
                    //If members count is less than five, add player to group
                    if ($group != null) {
                        $group_id = $group->group_id;
                    } else {
                        //Create a new group
                        $group = new Group();
                        $group->stake = $request->stake;
                        $group->game = $request->game;
                        $group->outcome = $request->outcome;
                        $group->number_of_participants = 1;
                        $group->save();

                        $group_id = $group->group_id;
                    }

                    $player = new Player();
                    $player->group_id = $group_id;
                    $player->msisdn = $request->msisdn;
                    $player->payment_status = 'PAID';

                    $player->save();

                    //Increase number_of_participants in $group by 1

                    Group::where('group_id', $group_id)->update(['number_of_participants' => count(Player::where('group_id', '=', $group_id)->get())]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'You have been successfully added to the draw. We will notify you when the results are out ready!',
                        'data' => ['group_id' => $group_id]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Payment count not be completed. Please try again later!'
                    ], 200);
                }
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Missing values!'
                ], 200);

            }
        } catch (\Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'System encountered an error!',
                'error' => $err->getMessage()
            ], 500);
        }
    }

    public function results(Request $request)
    {
        //Select groups JOIN players by group_id WHERE status in group = $resquest->status and msisdn in players = $request->msisdn
        $results = Group::from('groups AS g')
            ->join('players AS p', 'p.group_id', '=', 'g.group_id')
            ->where('p.result', '=', $request->status)
            ->where('p.msisdn', '=', $request->msisdn)
            ->get(['g.*','p.result']);

            return [
                'status'=>"success",
                'data'=>$results
            ];

    }



    public function destroy(Game $game)
    {
        //
    }
}
