<?php

namespace App\Observers;

use App\Models\Player;
use App\Models\User;
use App\Models\Group;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\TransactionsController;

class PlayerObserver
{
    /**
     * Handle the Player "created" event.
     *
     * @param  \App\Models\Player  $player
     * @return void
     */
    public function created(Player $player)
    {
        //Check if number_of_participants in group is equal to 5
        if(count(Player::where('group_id','=',$player->group_id)->get()) == 5){
            $group = Group::where('group_id','=',$player->group_id)->first();
            //Get all players whose group_id is equal to this group_id

            $players = Player::where('group_id','=', $player->group_id)->get();
            $shuffle_rounds = 21;
            $number_of_winners = $group->outcome[0];

            $playerIds = array();

            foreach($players as $player){
               $playerIds[] = $player->id;
            }


            for($index = 0; $index < $shuffle_rounds; $index++){
                shuffle($playerIds);
            }

            //Randomly select player equal to number_of_winners
            $winners = array_slice($playerIds, 0, $number_of_winners);
            $loosers = array_slice($playerIds, $number_of_winners, (count($playerIds) - 1));


            //Update result field of winners to WINNER
            foreach($winners as $winner){
                $player = Player::findOrFail($winner);
                $player->update(['result'=>'WINNER']);
            }

            //Update the status of players not in winners array to LOOSER
            foreach($loosers as $looser){
                $player = Player::findOrFail($looser);
                $player->update(['result'=>'LOOSER']);
            }


            //Update group status to PLAYED
            $group->status = 'PLAYED';
            $group->save();

        }
    }

    /**
     * Handle the Player "updated" event.
     *
     * @param  \App\Models\Player  $player
     * @return void
     */
    public function updated(Player $player)
    {
        try{
            $user = User::where('msisdn','=',$player->msisdn)->first();
            $group = Group::where('group_id','=',$player->group_id)->first();

            $msisdn = "+".$player->msisdn;
            $message = "";
            // $msisdn == '+265994791131' || $msisdn == "+265995311369"
            if(true){
                if($player->result == 'WINNER'){

                    $totalLosses = ($group->number_of_participants - $group->outcome[0]) * $group->stake;
                    $totalReturns = $group->stake + ($totalLosses/5);

                    //Credit player winnings
                    $creditPlayer = TransactionsController::creditPlayerWinnings($player->msisdn, $totalReturns);
                    $message = null;
                    if($creditPlayer == 'OK'){
                        $message = "Congratulations " . $user->firstname;
                        $message .= "! You came out winner of this draw. Your total returns ";
                        $message .= "are MWK" . number_format($totalReturns);
                    }else{
                        $message = "Dear customer, you won the previous draw but our system was unable to ";
                        $message .= "credit your account. Please call customer support to claim your funds.";
                    }
                    SMSController::sendSMS($msisdn, $message);

                }else if($player->result == 'LOOSER'){
                    $message = "Dear ".$user->firstname;
                    $message .= ", You were not successfull in this round or Raffle Draw. ";
                    $message .= "Better luck next round.";

                }
                SMSController::sendSMS($msisdn, $message);
            }
        }catch(\Exception $err){
            echo $err->getMessage();
        }

    }

    /**
     * Handle the Player "deleted" event.
     *
     * @param  \App\Models\Player  $player
     * @return void
     */
    public function deleted(Player $player)
    {
        //
    }

    /**
     * Handle the Player "restored" event.
     *
     * @param  \App\Models\Player  $player
     * @return void
     */
    public function restored(Player $player)
    {
        //
    }

    /**
     * Handle the Player "force deleted" event.
     *
     * @param  \App\Models\Player  $player
     * @return void
     */
    public function forceDeleted(Player $player)
    {
        //
    }
}
