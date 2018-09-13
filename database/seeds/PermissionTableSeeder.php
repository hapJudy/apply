<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->systemManage();
        $this->menus();
        $this->adminUser();
        $this->permission();
        $this->role();
        $this->goods();
        $this->goodsCategory();
        $this->stockManage();
        $this->stock();
        $this->purchase();
        $this->supplier();
    }

    /**
     * create system permission
     */
    public function systemManage()
    {
        $systemManage = New Permission();
        $systemManage->name = 'system.manage';
        $systemManage->display_name = '系统管理';
        $systemManage->description = '系统管理';
        $systemManage->save();
    }

    /**
     * create menus permission
     */
    public function menus()
    {
        $menusList = New Permission();
        $menusList->name = 'menus.list';
        $menusList->display_name = '目录列表';
        $menusList->description = '目录列表';
        $menusList->save();

        $menusAdd = New Permission();
        $menusAdd->name = 'menus.add';
        $menusAdd->display_name = '添加目录';
        $menusAdd->description = '添加目录';
        $menusAdd->save();

        $menusEdit = New Permission();
        $menusEdit->name = 'menus.edit';
        $menusEdit->display_name = '修改目录';
        $menusEdit->description = '修改目录';
        $menusEdit->save();

        $menusDelete = New Permission();
        $menusDelete->name = 'menus.delete';
        $menusDelete->display_name = '删除目录';
        $menusDelete->description = '删除目录';
        $menusDelete->save();
    }

    /**
     * create admin user permission
     */
    public function adminUser()
    {
        $adminUserList = New Permission();
        $adminUserList->name = 'adminuser.list';
        $adminUserList->display_name = '后台用户列表';
        $adminUserList->description = '后台用户列表';
        $adminUserList->save();

        $adminUserAdd = New Permission();
        $adminUserAdd->name = 'adminuser.add';
        $adminUserAdd->display_name = '添加后台用户';
        $adminUserAdd->description = '添加后台用户';
        $adminUserAdd->save();

        $adminUserEdit = New Permission();
        $adminUserEdit->name = 'adminuser.edit';
        $adminUserEdit->display_name = '修改后台用户';
        $adminUserEdit->description = '修改后台用户';
        $adminUserEdit->save();

        $adminUserDelete = New Permission();
        $adminUserDelete->name = 'adminuser.delete';
        $adminUserDelete->display_name = '删除后台用户';
        $adminUserDelete->description = '删除后台用户';
        $adminUserDelete->save();
    }

    /**
     * create permission permission
     */
    public function permission()
    {
        $permissionList = New Permission();
        $permissionList->name = 'permission.list';
        $permissionList->display_name = '权限列表';
        $permissionList->description = '权限列表';
        $permissionList->save();

        $permissionAdd = New Permission();
        $permissionAdd->name = 'permission.add';
        $permissionAdd->display_name = '添加权限';
        $permissionAdd->description = '添加权限';
        $permissionAdd->save();

        $permissionEdit = New Permission();
        $permissionEdit->name = 'permission.edit';
        $permissionEdit->display_name = '修改权限';
        $permissionEdit->description = '修改权限';
        $permissionEdit->save();

        $permissionDelete = New Permission();
        $permissionDelete->name = 'permission.delete';
        $permissionDelete->display_name = '删除权限';
        $permissionDelete->description = '删除权限';
        $permissionDelete->save();
    }

    /**
     * create role permission
     */
    public function role()
    {
        $roleList = New Permission();
        $roleList->name = 'role.list';
        $roleList->display_name = '角色列表';
        $roleList->description = '角色列表';
        $roleList->save();

        $roleAdd = New Permission();
        $roleAdd->name = 'role.add';
        $roleAdd->display_name = '添加角色';
        $roleAdd->description = '添加角色';
        $roleAdd->save();

        $roleEdit = New Permission();
        $roleEdit->name = 'role.edit';
        $roleEdit->display_name = '修改角色';
        $roleEdit->description = '修改角色';
        $roleEdit->save();

        $roleDelete = New Permission();
        $roleDelete->name = 'role.delete';
        $roleDelete->display_name = '删除角色';
        $roleDelete->description = '删除角色';
        $roleDelete->save();
    }



    public function goods(){
        $goodsList = New Permission();
        $goodsList->name = 'goods.list';
        $goodsList->display_name = '商品列表';
        $goodsList->description = '商品列表';
        $goodsList->save();

        $goodsAdd = New Permission();
        $goodsAdd->name = 'Goods.add';
        $goodsAdd->display_name = '添加商品';
        $goodsAdd->description = '添加商品';
        $goodsAdd->save();

        $goodsEdit = New Permission();
        $goodsEdit->name = 'goods.edit';
        $goodsEdit->display_name = '修改商品';
        $goodsEdit->description = '修改商品';
        $goodsEdit->save();

        $purchaseAdd = New Permission();
        $purchaseAdd->name = 'purchase.add';
        $purchaseAdd->display_name = '采购商品';
        $purchaseAdd->description = '采购商品';
        $purchaseAdd->save();

        $outboundAdd= New Permission();
        $outboundAdd->name = 'outbound.add';
        $outboundAdd->display_name = '商品出库';
        $outboundAdd->description = '出库商品';
        $outboundAdd->save();

        $goodsDelete = New Permission();
        $goodsDelete->name = 'goods.delete';
        $goodsDelete->display_name = '删除商品';
        $goodsDelete->description = '删除商品';
        $goodsDelete->save();
    }

    public function goodsCategory(){
        $goodsCategoryList = New Permission();
        $goodsCategoryList->name = 'goodsCategory.list';
        $goodsCategoryList->display_name = '分类列表';
        $goodsCategoryList->description = '分类列表';
        $goodsCategoryList->save();

        $goodsCategoryAdd = New Permission();
        $goodsCategoryAdd->name = 'goodsCategory.add';
        $goodsCategoryAdd->display_name = '添加分类';
        $goodsCategoryAdd->description = '添加分类';
        $goodsCategoryAdd->save();

        $goodsCategoryEdit = New Permission();
        $goodsCategoryEdit->name = 'goodsCategory.edit';
        $goodsCategoryEdit->display_name = '修改分类';
        $goodsCategoryEdit->description = '修改分类';
        $goodsCategoryEdit->save();


        $goodsCategoryDelete = New Permission();
        $goodsCategoryDelete->name = 'goodsCategory.delete';
        $goodsCategoryDelete->display_name = '删除分类';
        $goodsCategoryDelete->description = '删除分类';
        $goodsCategoryDelete->save();
    }

    /**
     * create stockManage permission
     */
    public function stockManage()
    {
        $stockanage = New Permission();
        $stockanage->name = 'stock.manage';
        $stockanage->display_name = '库存管理';
        $stockanage->description = '库存管理';
        $stockanage->save();
    }

    public function stock()
    {
        $inboundList = New Permission();
        $inboundList->name = 'inbound.list';
        $inboundList->display_name = '入库列表';
        $inboundList->description = '入库列表';
        $inboundList->save();

        $inboundEdit = New Permission();
        $inboundEdit->name = 'inbound.edit';
        $inboundEdit->display_name = '入库审核';
        $inboundEdit->description = '入库审核';
        $inboundEdit->save();

        $outboundList = New Permission();
        $outboundList->name = 'outbound.List';
        $outboundList->display_name = '出库列表';
        $outboundList->description = '出库列表';
        $outboundList->save();

        $inboundEdit = New Permission();
        $inboundEdit->name = 'outbound.edit';
        $inboundEdit->display_name = '出库审核';
        $inboundEdit->description = '出库审核';
        $inboundEdit->save();
    }

    public function  purchase(){
        $purchaseList = New Permission();
        $purchaseList->name = 'purchase.list';
        $purchaseList->display_name = '采购列表';
        $purchaseList->description = '采购列表';
        $purchaseList->save();

        $purchaseEdit = New Permission();
        $purchaseEdit->name = 'purchase.edit';
        $purchaseEdit->display_name = '采购审核';
        $purchaseEdit->description = '采购审核';
        $purchaseEdit->save();

        $purchaseDelete = New Permission();
        $purchaseDelete->name = 'purchase.delete';
        $purchaseDelete->display_name = '采购单删除';
        $purchaseDelete->description = '采购单删除';
        $purchaseDelete->save();

    }

    public function supplier(){
        $supplierList = New Permission();
        $supplierList->name = 'supplier.list';
        $supplierList->display_name = '供应商列表';
        $supplierList->description = '供应商列表';
        $supplierList->save();

        $supplierAdd = New Permission();
        $supplierAdd->name = 'supplier.add';
        $supplierAdd->display_name = '添加供应商';
        $supplierAdd->description = '添加供应商';
        $supplierAdd->save();

        $supplierEdit = New Permission();
        $supplierEdit->name = 'supplier.edit';
        $supplierEdit->display_name = '修改供应商';
        $supplierEdit->description = '修改供应商';
        $supplierEdit->save();


        $supplierDelete = New Permission();
        $supplierDelete->name = 'supplier.delete';
        $supplierDelete->display_name = '删除供应商';
        $supplierDelete->description = '删除供应商';
        $supplierDelete->save();
    }

    }
