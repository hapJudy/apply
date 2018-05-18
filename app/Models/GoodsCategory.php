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
    /*protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];*/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hasManyGoods(){
       return $this->hasMany('Goods','CategoryId','CategoryId');
    }

}
