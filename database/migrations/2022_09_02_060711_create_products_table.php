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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('p_type')->nullable();
            $table->string('p_name')->nullable();
            $table->string('p_image')->nullable();
            $table->string('p_sku')->nullable();
            $table->string('p_size_qnty')->nullable();
            $table->string('p_size_price')->nullable();
            $table->string('p_ship_time')->nullable();
            $table->string('p_color')->nullable();
            $table->string('p_catog')->nullable();
            $table->string('p_sub_catog')->nullable();
            $table->string('p_child_catog')->nullable();
            $table->string('p_new_price')->nullable();
            $table->string('p_old_price')->nullable();
            $table->string('p_stock')->nullable();
            $table->string('p_detail')->nullable();
            $table->string('p_r_policy')->nullable();
            $table->boolean('small')->default(0);
            $table->boolean('medium')->default(0);
            $table->boolean('large')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
