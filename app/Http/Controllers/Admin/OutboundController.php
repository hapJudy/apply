<?php

namespace App\Http\Controllers\Admin;

use App\models\Goods;
use App\Repositories\Eloquent\OutboundRepositoryEloquent as OutboundRepository;
use App\Repositories\Eloquent\GoodsRepositoryEloquent as GoodsRepository;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class OutboundController extends Controller
{
    public $permission;

    public $goods;
    public function __construct(OutboundRepository $outbound)
    {
        $this->middleware('CheckPermission:outbound');


        $this->outbound = $outbound;
        $this->goods=new Goods();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $outbound = $this->outbound->with('goods')->getAll();


        return view('admin.outbound.index')->with('data',$outbound);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data['goods']=DB::table('goods')->find($request->all());
       //dd($data);

       if($data['goods']->GoodsNumber<=$data['goods']->goodsLowNumber){
           //sdd('dd');
           flash('该商品库存不足！暂不能出库','error');
          return  redirect('admin/goods');
       }




        return view('admin.outbound.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $request['profile']=$request->input('outNumber')*$request->input('outPrice');

      $goods=Goods::where(array('id'=>$request->input('goodsId')))->get()->toArray();
      if ($goods[0]['GoodsNumber']<$request->input('outNumber')){
          flash('该商品库存不足！暂不能出库','error');
          return  redirect('admin/goods');
      }

        $this->outbound->createOutbound($request->all());
        return redirect('admin/outbound');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //dd($request->all());
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
            return redirect('admin/outbound');
        }
        //dd($request->all());
        $outbound=$this->outbound->with('goods')->findWhere(array('id'=>$id));
       // dd($outbound->toArray());

        return view('admin/outbound/edit')->with('data',$outbound);
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {


        $this->outbound->updateOutbound($request->all(),$id);



        return redirect('admin/outbound');
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
