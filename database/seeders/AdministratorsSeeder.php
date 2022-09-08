<?php

namespace Database\Seeders;
use App\Models\Administrator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Administrator::create([
            'firstname'=>'Clifford',
            'lastname'=>"Mwale",
            'msisdn'=>'265994791131',
            'email'=>'cliffmwale97@gmail.com',
            'password'=>Hash::make('password')
        ]);
    }
}
