<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('SupplierId');
            $table->string('SupplierCompany')->comments('供货商名称');
            $table->string('SupplierName')->comments('供货商法人代表');
            $table->string('DetailAddress')->comments('供货商地址');
            $table->string('SupplierNumber')->comments('联系方式');
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
        Schema::drop('suppliers');
    }
}
