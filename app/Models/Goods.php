<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\Admin\ActionButtonTrait;
class Goods extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    use ActionButtonTrait;
    protected $table = 'goods';
    /*protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];*/

    public function belongsToGoodsCategory(){
        return $this->belongsTo('GoodsCategory','CategoryId','CategoryId');
    }

}
