<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Account;

class UserObserver
{

    public function created(User $user)
    {
        //Create account record after user has been created
        $account = new Account();
        $account->msisdn = $user->msisdn;
        $account->save();
    }


    public function deleted(User $user)
    {
        //Delete account record after user has been deleted
        $account = Account::where('msisdn', $user->msisdn)->first();
        $account->delete();
    }

    public function restored(User $user)
    {
        //Restore account record after user has been restored
        $account = Account::where('msisdn', $user->msisdn)->first();
        $account->restore();

    }


}
