<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('GoodsName');
            $table->string('GoodsSN')->comment('商品编号');
            $table->string('GoodsNumber')->comment('商品库存量');
            $table->decimal('GoodsPrice')->comment('商品售价');
            $table->integer('CategoryId')->comment('商品分类');
            $table->integer('SupplierId')->comment('商品供应商');
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
        Schema::drop('goods');
    }
}
