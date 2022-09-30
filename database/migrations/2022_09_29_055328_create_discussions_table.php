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
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item');
            $table->foreign('item')->references('id')->on('products');
            $table->string('session')->nullable();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->unsignedBigInteger('ven_id')->nullable();
            $table->foreign('ven_id')->references('id')->on('vendors');
            $table->string('user_name');
            $table->string('email');
            $table->integer('review')->default(4);
            $table->longText('comment')->nullable();
            $table->bigInteger('help')->default(0);
            $table->bigInteger('unhelp')->default(0);
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
        Schema::dropIfExists('discussions');
    }
};
