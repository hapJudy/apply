<?php

namespace App\Http\Controllers\Admin;


use App\models\Goods;
use App\Repositories\Eloquent\InBoundRepositoryEloquent as InboundRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class InboundController extends Controller
{
    public $permission;

    public function __construct(InboundRepository $inbound)
    {
        $this->middleware('CheckPermission:inbound');


        $this->inbound = $inbound;
        $this->goods=new Goods();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $inbound = $this->inbound->with('goods')->getAll();



        return view('admin.inbound.index')->with('data',$inbound);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data['goods']=DB::table('goods')->find($request->all());
       $data['suppliers']=DB::table('suppliers')->get();
       //dd($data);



        return view('admin.purchase.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->purchase->createPurchase($request->all());
        return redirect('admin/purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        dd($request->all());
        if(!$request->all()){
            return redirect('admin/purchase');
        }

        $purchase=$this->purchase->with('goods')->with('supplier')->findWhere($request->all());
        //dd($purchase);

        return view('admin/purchase/edit')->with('data',$purchase);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id){
            return redirect('admin/inbound');
        }

        $inbound=$this->inbound->with('goods')->with('supplier')->findWhere(array('id'=>$id));
        if ($inbound[0]->status == 1){
            flash('该入库单已经上架，该操作已经执行','error');
            return redirect('admin/inbound');
        }


        return view('admin/inbound/edit')->with('data',$inbound);
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $this->inbound->updateInbound($request->all(),$id);

        /*//入库商品已经上架的情况下更新商品的数量
        $boundInfo=$this->inbound->with('goods')->findWhere(array('id'=>$id,'status'=>1))->toArray();
        if(count($boundInfo)){
            $data=array(
                'goodsNumber'=>$boundInfo[0]['inNumber']+$boundInfo[0]['goods']['GoodsNumber']
            );
            $where=array(
                'id'=>$boundInfo[0]['goodsId']
            );
            $model = $this->goods->findOrFail($where);
            //dd($model->toArray());

            $model->fill($data);
            $model->save();
        }*/

        return redirect('admin/inbound');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $this->purchase->delete($id);
    }

    public function ajaxIndex(Request $request)
    {

        $result = $this->permission->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
