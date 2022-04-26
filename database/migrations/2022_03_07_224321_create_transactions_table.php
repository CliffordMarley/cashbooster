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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('txn_reference',20)->ubnique()->nullable(false);
            $table->string('msisdn',15);
            $table->double('amount',18,2);
            $table->string('currency',3)->default('MWK');
            $table->string('status',20)->default('PENDING');
            $table->string('description',100)->nullable();
            $table->timestamps();

            $table->foreign('msisdn')->references('msisdn')->on('accounts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
