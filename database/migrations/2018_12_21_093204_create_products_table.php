<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('name_product',40);
            $table->string('name_categorie',40);
            $table->integer('prix');
            $table->integer('remise');
            $table->integer('sells');
            $table->integer('promote');
            $table->integer('disponible');
            $table->integer('quantity');
            $table->longText('summery');
            $table->longText('images');
            $table->string('last_time_bought',25);
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
}
