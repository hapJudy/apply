<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutBoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('outBound',function(Blueprint $table){

            $table->increments('id');
            $table->integer('goodsId');
            $table->integer('outNumber')->comment('入库数量');
            $table->decimal('outPrice',8,2)->comment('出库商品售价');
            $table->decimal('profile',8,2)->comment('获得净利润');
            $table->boolean('status')->comment('是否同意出库');
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
           Schema::drop('outBound');

    }
}
