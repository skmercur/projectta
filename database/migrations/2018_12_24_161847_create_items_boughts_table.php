<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsBoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_boughts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_buyer');
            $table->string('code_product',191);
            $table->longText('image_ccp');
            $table->string('code_commentaire',8)->unique();
            $table->integer('status');
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
        Schema::dropIfExists('items_boughts');
    }
}
