<?php

namespace App\Traits\Admin;

trait ActionButtonTrait
{
    /**
     * @param $actionModel string 模型
     * @return string
     */
    public function editButton($actionModel,$id = null)
    {
        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){

            return "<a href='".url('admin').'/'.$actionModel.'/'.$this->id."/edit'><button type='button' class='btn btn-success btn-xs'><i class='fa fa-pencil'> 编辑</i></button></a> ";
        }
        return '';
    }

    public function deleteButton($actionModel,$id = null)
    {
        if (!empty($id)){
            $this->id = $id;
        }
        if (auth('admin')->user()->can("{$actionModel}.delete")){
            $button = "";
            $button .= "<a href='javascript:;' data-id='".$this->id."' class='btn btn-danger btn-xs destroy'>";
            $button .= "<i class='fa fa-trash'> 删除</i>";
            $button .= "<form action='".url('admin/'.$actionModel.'/'.$this->id)."' method='POST'  name='delete_item_".$this->id."'  style='display:none'>";
            $button .= method_field('DELETE').csrf_field();
            $button .= '</form></a> ';
            return $button;
        }
        return '';
    }

    /**
     * @param $actionModel string 模型
     * @return string
     */
    public function OutBoundButton($actionModel,$id = null)
    {
        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){

            return "<a href='".url('admin').'/outbound/create?id='.$this->id."'><button type='button' class='btn btn-info btn-xs'><i class='fa fa-pencil'> 出库</i></button></a> ";
        }
        return '';
    }

    /**
 * @param $actionModel string 模型
 * @return string
 */
    public function PurchaseButton($actionModel,$id = null)
    {
        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){

            return "<a href='".url('admin').'/purchase/create?id='.$this->id."'><button type='button' class='btn btn-warning btn-xs'><i class='fa fa-pencil'> 采购</i></button></a> ";
        }
        return '';
    }

    public function checkButton($actionModel,$id = null)
    {
        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){

            return "<a href='".url('admin').'/'.$actionModel.'/'.$this->id."/edit'><button type='button' class='btn btn-circle btn-xs'><i class='fa fa-pencil'> 审核</i></button></a> ";
        }
        return '';
    }
    public function getOnlineButton($actionModel,$id = null)
    {

        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){

            return "<a href='".url('admin').'/'.$actionModel.'/'.$this->id."/edit'><button type='button' class='btn btn-success btn-xs'><i class='fa fa-pencil'> 上架</i></button></a> ";
        }
        return '';
    }

    public function getOutstockButton($actionModel,$id = null)
    {

        if (!empty($id)){
            $this->id = $id;
        }

        if (auth('admin')->user()->can("{$actionModel}.edit")){
            // dd('123');
            return "<a href='".url('admin').'/'.$actionModel.'/'.$this->id."/edit'><button type='button' class='btn btn-success btn-xs'><i class='fa fa-pencil'> 出库</i></button></a> ";
        }
        return '';
    }


    public function getActionButtons($actionModel,$id = null)
    {

        return $this->editButton($actionModel,$id).$this->deleteButton($actionModel,$id);
    }
    public function getGoodsButtons($actionModel,$id = null)
    {

        return $this->editButton($actionModel,$id).$this->PurchaseButton($actionModel,$id).$this->OutBoundButton($actionModel,$id).$this->deleteButton($actionModel,$id);
    }
    public function getPurchaseButtons($actionModel,$id=null){
        return $this->deleteButton($actionModel,$id);
    }


}