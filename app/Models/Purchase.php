<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\Admin\ActionButtonTrait;
class Purchase extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    use ActionButtonTrait;
    protected $table = 'Purchase';
    protected  $primaryKey='id';
    protected $fillable = [
        'goodsId',
        'number',
        'supplierId',
        'price',
        'status'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function goods(){
       return $this->hasOne(Goods::class,'id','goodsId');
    }

    public function  supplier(){
        return $this->hasOne(Supplier::class,'id','supplierId');
    }

}
