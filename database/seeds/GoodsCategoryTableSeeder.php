<?php

use Illuminate\Database\Seeder;

use App\Models\GoodsCategory;

class GoodsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $category1=new GoodsCategory();
       $category1->CategoryName='家具/家具/厨具';
       $category1->save();

       $category2=new GoodsCategory();
       $category2->CategoryName='美妆/个护清洁';
       $category2->save();


        $category3=new GoodsCategory();
        $category3->CategoryName='生鲜/食品/特产';
        $category3->save();


    }
}
