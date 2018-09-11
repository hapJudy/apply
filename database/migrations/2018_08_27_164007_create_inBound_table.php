<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInBoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('inBound',function(Blueprint $table){

            $table->increments('id');
            $table->integer('goodsId');
            $table->integer('inNumber')->comment('入库数量');
            $table->decimal('inPrice',8,2)->comment('入库商品单价');
            $table->boolean('status')->comment('是否同意入库');
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
        Schema::drop('inBound');
    }
}
