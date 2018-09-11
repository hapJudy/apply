<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('purchase',function(Blueprint $table){

            $table->increments('id');
            $table->integer('goodsId');
            $table->integer('number')->comment('采购数量');
            $table->integer('supplierId')->comment('采购的供应商ID');
            $table->boolean('status')->comment('是否同意采购');
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
        //
        Schema::drop('purchase');
    }
}
