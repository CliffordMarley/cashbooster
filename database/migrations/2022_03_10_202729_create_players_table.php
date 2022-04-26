<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('group_id')->nullable(true);
            $table->string('msisdn')->nullable();
            $table->enum('entry_status',['UNASSIGNED','ASSIGNED','CANCELLED'])->default('UNASSIGNED');
            $table->enum('payment_status',['UNCONFIMED','PAID','FAILED','CANCELLED'])->default('UNCONFIMED');
            $table->enum('result',['UNKNOWN','WINNER','LOOSER'])->defaul('UNKNOWN');
            $table->timestamps();

            //Make group id reference group_id in groups table
            $table->foreign('group_id')->references('group_id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
