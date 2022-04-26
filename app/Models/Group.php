<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'stake', 'outcome', 'number_of_participants'];

    //Generate hashed group id from boot function
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($group) {
            $group->group_id = self::GenerateGroupID();
        });
    }

    protected static function GenerateGroupID(){
        $_proposed_group_id = hash('sha256', rand(1000000, 9999999));
        //Check if group id is unique
        if(!Group::where('group_id','=', $_proposed_group_id)->exists()){
            return $_proposed_group_id;
        }else{
            return self::GenerateGroupID();
        }
    }
}

