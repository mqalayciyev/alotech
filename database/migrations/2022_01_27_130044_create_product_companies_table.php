<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->bigInteger('price_id')->unsigned();
            $table->decimal('discount', 8,2)->nullable();
            $table->engine = "InnoDB";

            $table->foreign('product_id')->references("id")->on("product")->onDelete('cascade');
            $table->foreign('company_id')->references("id")->on("product")->onDelete('cascade');
            $table->foreign('price_id')->references("id")->on("price_list")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_companies');
    }
}
