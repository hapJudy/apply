<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodsCategory', function (Blueprint $table) {
            $table->increments('CategoryId');
            $table->string('CategoryName')->comment('商品类型名称');
            $table->integer('ParentId')->comment('父级ID');
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
        Schema::drop('goodsCategory');
    }
}
