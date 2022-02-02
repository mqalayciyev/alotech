<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_returns', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('description');
            $table->tinyInteger('status')->default(0)->nullable();
            $table->timestamps();

            $table->engine = "InnoDB";

            $table->foreign('order_id')->references("id")->on("order")->onDelete('cascade');
            $table->foreign('user_id')->references("id")->on("user")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_returns');
    }
}
