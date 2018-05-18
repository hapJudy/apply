<?php

namespace App\Repositories\Eloquent;

use App\Models\Goods;

use App\Repositories\Contracts\GoodsRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


/**
 * Class MenuRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class GoodsRepositoryEloquent extends BaseRepository implements GoodsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Goods::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAll($columns = ['*'])
    {
        $list = $this->all($columns)->toArray();

        foreach ($list as $key => $value) {
            $list[$key]['button'] = $this->model->getActionButtons('permission',$value['id']);
        }
        return $list;

    }

    public function ajaxIndex($request)
    {
        $draw            = $request->input('draw',1);
        $start           = $request->input('start',0);
        $length          = $request->input('length',10);
        $order['name']   = $request->input('columns.' .$request->input('order.0.column') . '.name');
        $order['dir']    = $request->input('order.0.dir','asc');
        $search['value'] = $request->input('search.value','');
        $search['regex'] = $request->input('search.regex',false);

        if ($search['value']){
            if ($search['regex'] == 'true'){
                $this->model = $this->model->where('display_name','like',"%{$search['value']}%")->orWhere('name','like',"%{$search['value']}%");
            }else{
                $this->model = $this->model->where('display_name',$search['value'])->orWhere('name',$search['value']);
            }
        }

        $count = $this->model->count();
        $this->model = $this->model->orderBy($order['name'],$order['dir']);
        $this->model = $this->model->offset($start)->limit($length)->get();

        if ($this->model) {
            foreach ($this->model as $item) {
                $item->button = $item->getActionButtons('permission');
            }
        }

        return [
            'draw'              =>$draw,
            'recordsTotal'      =>$count,
            'recordsFiltered'   => $count,
            'data'              =>$this->model
        ];
    }

    /**
     * 添加权限
     * @param array $attr
     * @return mixed
     */
    public function createGoods(array $attr)
    {
        $res = $this->model->create($attr);
        if ($res) {
            flash('商品添加成功', 'success');
        } else {
            flash('商品添加失败', 'error');
        }
        return $res;
    }

    public function updatePermission(array $attr, $id)
    {
        $res = $this->update($attr,$id);
        if ($res) {
            flash('修改成功!', 'success');
        } else {
            flash('修改失败!', 'error');
        }
        return $res;
    }



}
