<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use  App\Repositories\Eloquent\GoodsRepositoryEloquent as GoodsRepository;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public $permission;

    public function __construct(GoodsRepository $GoodsRepository)
    {
        $this->middleware('CheckPermission:goods');

        $this->goods = $GoodsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $goodslist = $this->goods->with('GoodsCategory')->getAll();

 

        //$permission=DB::table('permissions')->get();


        return view('admin.goods.index')->with('data',$goodslist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->goods->createGoods($request->all());
        return redirect('admin/goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permission->find($id,['id','name','display_name','description'])->toArray();
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PermissionRequest $request, $id)
    {
        $this->permission->updatePermission($request->all(),$id);
        return redirect('admin/permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function ajaxIndex(Request $request)
    {

        $result = $this->permission->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
