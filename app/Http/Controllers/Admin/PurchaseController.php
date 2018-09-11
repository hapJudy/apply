<?php

namespace App\Http\Controllers\Admin;


use App\models\Goods;
use App\models\Inbound;
use App\models\Purchase;
use App\Repositories\Eloquent\GoodsRepositoryEloquent as GoodsRepository;
use App\Repositories\Eloquent\PurchaseRepositoryEloquent as PurchaseRepository;
use Faker\Calculator\Iban;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Presenter\ModelFractalPresenter;


class PurchaseController extends Controller
{
    public $permission;

    public function __construct(PurchaseRepository $purchase)
    {
        $this->middleware('CheckPermission:purchase');


        $this->purchase = $purchase;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $purchase = $this->purchase->with('goods')->with('supplier')->getAll();

       //dd($purchase);

        //$permission=DB::table('permissions')->get();


        return view('admin.purchase.index')->with('data',$purchase);
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
            return redirect('admin/purchase');
        }
        //dd($request->all());
        $purchase=$this->purchase->with('goods')->with('supplier')->findWhere(array('id'=>$id));
        //dd($purchase);

        return view('admin/purchase/edit')->with('data',$purchase);
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->purchase->updatePurchase($request->all(),$id);

        //审核通过，执行入库操作
        $purchase=$this->purchase->with('goods')->findWhere(array('id'=>$id))->toArray();
        $data=array(
            'goodsId'=>$purchase[0]['goods']['id'],
            'inPrice'=>$purchase[0]['price'],
            'inNumber'=>$purchase[0]['number'],
            'status'=>0
        );
         $obj=new Inbound();
         $obj->create($data);


        return redirect('admin/purchase');
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
