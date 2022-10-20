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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('staf_id');
            $table->foreign('staf_id')->references('id')->on('admins');
            $table->string('symbol')->default('$');
            $table->string('code')->default('F423F'); // hexadecimal code for 999999.....
            $table->double('cost', 8, 2)->default(9.99);
            $table->bigInteger('days')->default(7);
            $table->integer('limit')->default('0');
            $table->longText('detail')->nullable();
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
        Schema::dropIfExists('subscription_plans');
    }
};
