<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToGoodsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goodsCategory', function (Blueprint $table) {
            $table->string('Type')->nullable()->after('ParentId')->comment('分类类别，1:商品分类，2:供应商分类');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goodsCategory', function (Blueprint $table) {
            //
            $table->dropColumn('Type');
        });
    }
}
