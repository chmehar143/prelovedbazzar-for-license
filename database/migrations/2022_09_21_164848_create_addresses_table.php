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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('company')->nullable();
            $table->string('country');
            $table->string('street');
            $table->string('apart')->nullabel();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('s_fname')->nullable();
            $table->string('s_lname')->nullable();
            $table->string('s_company')->nullable();
            $table->string('s_country');
            $table->string('s_street');
            $table->string('s_apart')->nullabel();
            $table->string('s_city');
            $table->string('s_state');
            $table->string('s_zip');
            $table->string('s_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
