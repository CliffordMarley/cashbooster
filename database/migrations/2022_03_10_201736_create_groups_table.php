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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_id')->unique()->nullable(false);
            $table->unsignedBigInteger('game')->nullable(false);
            $table->decimal('stake',18,2)->default(0.00);
            $table->enum('outcome',['3x','4x'])->nullable(false);
            $table->integer('number_of_participants')->nullable(false);
            $table->enum('status',['PENDING','PLAYED','CANCELLED'])->default('PENDING');
            $table->timestamps();

            //Make game reference id in games table
            $table->foreign('game')->references('id')->on('games')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
