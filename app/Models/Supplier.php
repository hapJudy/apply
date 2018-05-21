<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\Admin\ActionButtonTrait;
class Supplier extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    use ActionButtonTrait;
    protected $table = 'suppliers';
    protected $fillable = [
        'id',
        'SupplierCompany',
        'SupplierNumber',
        'SupplierName',
        'province',
        'city',
        'district',
        'DetailAddress'
    ];

    /*public function belongsToGoodsCategory(){
        return $this->belongsTo('GoodsCategory','CategoryId','CategoryId');
    }*/



}
