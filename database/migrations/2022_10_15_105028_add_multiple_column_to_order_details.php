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
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string('seller_name')->nullable();
            $table->string('store_name')->nullable();
            $table->string('item_name');
            $table->string('sub_shipping');
            $table->string('sub_status');
            $table->string('tracking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('vendor_id');
            $table->dropColumn('seller_name');
            $table->dropColumn('store_name');
            $table->dropColumn('item_name');
            $table->dropColumn('sub_shipping');
            $table->dropColumn('sub_status');
            $table->dropColumn('tracking');
        });
    }
};
