<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InternalAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname'=>'Cash',
            'lastname'=>'Booster',
            'alias'=>'Collection',
            'msisdn'=>'1002022',
            'email'=>'account@cashbooster.com',
            'password'=>Hash::make('Angelsdie1997@1997')
        ]);
    }
}
