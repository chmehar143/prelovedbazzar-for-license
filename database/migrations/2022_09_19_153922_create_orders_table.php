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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fname');
            $table->string('lname');
            $table->string('company')->nullable();
            $table->string('country');
            $table->string('street');
            $table->string('apart')->nullabel();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip');
            $table->string('phone');
            $table->string('s_fname');
            $table->string('s_lname');
            $table->string('s_company')->nullable();
            $table->string('s_country');
            $table->string('s_street');
            $table->string('s_apart')->nullabel();
            $table->string('s_city')->nullable();
            $table->string('s_state')->nullable();
            $table->string('s_zip');
            $table->string('s_phone')->nullable();
            $table->string('note')->nullable();
            $table->string('net_amount')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('pay_status')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('orders');
    }
};
