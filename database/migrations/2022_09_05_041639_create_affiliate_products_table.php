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
        Schema::create('affiliate_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->tinyInteger('a_type')->default(0);
            $table->string('a_name')->nullable();
            $table->string('a_image')->nullable();
            $table->string('a_sku')->nullable();
            $table->ipAddress('a_link')->nullable();
            $table->string('a_size_qnty')->nullable();
            $table->double('a_size_price', 8, 2)->default(0.00);
            $table->string('a_ship_time')->nullable();
            $table->string('a_color')->nullable();
            $table->string('a_catog')->nullable();
            $table->string('a_sub_catog')->nullable();
            $table->string('a_child_catog')->nullable();
            $table->double('a_new_price', 8, 2)->default(0.00);
            $table->string('a_old_price', 8, 2)->default(0.00);
            $table->bigInteger('a_stock')->defaul(9999);
            $table->string('a_detail')->nullable();
            $table->string('a_r_policy')->nullable();
            $table->boolean('a_small')->default(0);
            $table->boolean('a_medium')->default(0);
            $table->boolean('a_large')->default(0);
            $table->integer('a_status')->default(0);
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
        Schema::dropIfExists('affiliate_products');
    }
};
