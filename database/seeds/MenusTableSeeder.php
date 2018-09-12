<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemManage = new Menu();
        $systemManage->name = '系统';
        $systemManage->url = 'admin/menus';
        $systemManage->slug = 'system.manage';
        $systemManage->icon = 'fa fa-cogs';
        $systemManage->parent_id = 0;
        $systemManage->save();

        $menusManage = new Menu();
        $menusManage->name = '后台目录管理';
        $menusManage->url = 'admin/menus';
        $menusManage->slug = 'menus.list';
        $menusManage->parent_id = $systemManage->id;
        $menusManage->save();

        $adminUserManage = new Menu();
        $adminUserManage->name = '后台用户管理';
        $adminUserManage->url = 'admin/adminuser';
        $adminUserManage->slug = 'adminuser.list';
        $adminUserManage->parent_id = $systemManage->id;
        $adminUserManage->save();

        $permissionManage = new Menu();
        $permissionManage->name = '权限管理';
        $permissionManage->url = 'admin/permission';
        $permissionManage->slug = 'permission.list';
        $permissionManage->parent_id = $systemManage->id;
        $permissionManage->save();

        $roleManage = new Menu();
        $roleManage->name = '角色管理';
        $roleManage->url = 'admin/role';
        $roleManage->slug = 'role.list';
        $roleManage->parent_id = $systemManage->id;
        $roleManage->save();

        $GoodsManage = new Goods();
        $GoodsManage->name = '商品管理';
        $GoodsManage->url = 'admin/goods';
        $GoodsManage->slug = 'goods.list';
        $GoodsManage->icon = 'fa fa-cogs';
        $GoodsManage->parent_id = 0;
        $GoodsManage->save();

        $GoodsList = new Goods();
        $GoodsList->name = '商品管理';
        $GoodsList->url = 'admin/goods';
        $GoodsList->slug = 'goods.list';
        $GoodsList->parent_id = $GoodsManage->id;
        $GoodsList->save();

        $InboundManage =new \App\models\Inbound();
        $InboundManage->name = '库存管理';
        $InboundManage->url = 'admin/inbound';
        $InboundManage->slug = 'inbound.list';
        $InboundManage->icon = 'fa fa-cogs';
        $InboundManage->parent_id = 0;
        $InboundManage->save();

        $Inboundlist = new \App\models\Inbound();
        $Inboundlist->name = '入库管理';
        $Inboundlist->url = 'admin/inbound';
        $Inboundlist->slug = 'inbound.list';
        $Inboundlist->parent_id = $InboundManage->id;
        $Inboundlist->save();
        $Outboundlist = new \App\models\Outbound();
        $Outboundlist->name = '出库管理';
        $Outboundlist->url = 'admin/outbound';
        $Outboundlist->slug = 'outbound.list';
        $Outboundlist->parent_id = $InboundManage->id;
        $Outboundlist->save();


        $SupplierManage = new \App\models\Supplier();
        $SupplierManage->name = '供应商管理';
        $SupplierManage->url = 'admin/supplier';
        $SupplierManage->slug = 'supplier.list';
        $SupplierManage->icon = 'fa fa-cogs';
        $SupplierManage->parent_id = 0;
        $SupplierManage->save();

        $SupplierList = new \App\models\Supplier();
        $SupplierList->name = '供应商管理';
        $SupplierList->url = 'admin/supplier';
        $SupplierList->slug = 'supplier.list';
        $SupplierList->parent_id = $SupplierManage->id;
        $SupplierList->save();

        $PurchaseManage = new \App\models\Purchase();
        $PurchaseManage->name = '采购管理';
        $PurchaseManage->url = 'admin/purchase';
        $PurchaseManage->slug = 'purchase.list';
        $PurchaseManage->icon = 'fa fa-cogs';
        $PurchaseManage->parent_id = 0;
        $PurchaseManage->save();

        $PurchaseList = new \App\models\Purchase();
        $PurchaseList->name = '采购管理';
        $PurchaseList->url = 'admin/purchase';
        $PurchaseList->slug = 'purchase.list';
        $PurchaseList->parent_id = $PurchaseManage->id;
        $PurchaseList->save();

    }
}
