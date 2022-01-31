<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->integer('cart_id')->nullable()->unsigned();
            $table->decimal('discount', 8,2);
            $table->tinyInteger('count');
            $table->engine = "InnoDB";

            $table->foreign('product_id')->references("id")->on("product")->onDelete('cascade');
            $table->foreign('cart_id')->references("id")->on("cart")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
