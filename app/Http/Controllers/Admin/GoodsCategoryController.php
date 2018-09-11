<?php

namespace App\Http\Controllers\Admin;

use App\models\GoodsCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use  App\Repositories\Eloquent\GoodsCategoryRepositoryEloquent as GoodsCategoryRepository;
use Illuminate\Support\Facades\DB;

class GoodsCategoryController extends Controller
{
    public $permission;

    public function __construct(GoodsCategoryRepository $goodsCategoryRepository)
    {
        //dd($goodsCategoryRepository);
        $this->middleware('CheckPermission:goodsCategory');

        $this->goodsCategory = $goodsCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $goodslist = $this->goodsCategory->with('hasManyGoods')->getAll();


        //$permission=DB::table('permissions')->get();


        return view('admin.goodsCategory.index')->with('data',$goodslist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=GoodsCategory::all();

        return view('admin.goodsCategory.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->goodsCategory->createGoodsCategory($request->all());
        return redirect('admin/goodsCategory');
    }

    public function ajax(Request $request){
       $category=$this->goodsCategory->findWhere($request->all());
       if(!$category){
           dd('faile');
       }else{
           return $category;
       }

    }

    /**
     * Displ;ay the specified resource.
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
        $permission = $this->goodsCategory->find($id,['id','name','display_name','description'])->toArray();
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
        dd(123);
        dd($request->all());
        $result = $this->permission->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
