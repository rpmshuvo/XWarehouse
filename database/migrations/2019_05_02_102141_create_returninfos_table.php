<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturninfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returninfos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('returnQuantity');
            $table->integer('damage');
            $table->double('returnAmount');
            $table->integer('invoice_id');


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
        Schema::dropIfExists('returninfos');
    }
}
