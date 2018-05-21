<?php

use Illuminate\Database\Seeder;

use App\Models\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $supplier1=new Supplier();
        $supplier1->SupplierCompany='奶粉供货商';
        $supplier1->SupplierName='李亮';
        $supplier1->province='河南省';
        $supplier1->city='郑州市';
        $supplier1->district='二七区';
        $supplier1->DetailAddress="河南省漯河市XXX区123号";
        $supplier1->SupplierNumber="0371-66875467";
        $supplier1->save();

        $supplier2=new Supplier();
        $supplier2->SupplierCompany='玩具供货商';
        $supplier2->SupplierName='梁芳';
        $supplier2->province='河南省';
        $supplier2->city='郑州市';
        $supplier2->district='二七区';
        $supplier2->DetailAddress="河南省安阳市XXX区123号";
        $supplier2->SupplierNumber="0371-66875467";
        $supplier2->save();

        $supplier3=new Supplier();
        $supplier3->SupplierCompany='女装供货商';
        $supplier3->SupplierName='刘洋亮';
        $supplier3->province='河南省';
        $supplier3->city='郑州市';
        $supplier3->district='二七区';
        $supplier3->DetailAddress="陕西省宝鸡市XXX区123号";
        $supplier3->SupplierNumber="0371-66875467";
        $supplier3->save();


    }
}
