<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\Admin\ActionButtonTrait;
class GoodsCategory extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    use ActionButtonTrait;
    protected $table = 'goodsCategory';
    protected  $primaryKey='CategoryId';
    protected $fillable = [
        'CategoryName',
        'parentId',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hasManyGoods(){
       return $this->hasMany(Goods::class,'CategoryId','CategoryId');
    }

}
