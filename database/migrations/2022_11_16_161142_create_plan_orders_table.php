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
        Schema::create('plan_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('id')->on('subscription_plans')->onDelete('cascade');
            $table->string('strip_customer_id');
            $table->string('paid_amount');
            $table->string('payment_status');
            $table->string('receipt_url');
            $table->bigInteger('remainig_days');
            $table->bigInteger('allowed_quantity')->default(0);
            $table->bigInteger('remaining_quantity')->nullable();
            $table->boolean('status')->default(0)->comment("0=active, 1=expired");
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
        Schema::dropIfExists('plan_orders');
    }
};
