<?php

namespace App\Http\Controllers\Admin;

use App\models\GoodsCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use  App\Repositories\Eloquent\SupplierRepositoryEloquent as SupplierRepository;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public $permission;

    public function __construct(SupplierRepository $SupplierRepository)
    {
        $this->middleware('CheckPermission:supplier');

        $this->Supplier = $SupplierRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $supplierList = $this->Supplier->getAll();

        //dd($supplierList);

        return view('admin.supplier.index')->with('data',$supplierList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request PermissionRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->Supplier->createSupplier($request->all());
        return redirect('admin/supplier');
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
     * @param  int $SupplierId
     * @return \Illuminate\Http\Response
     */
    public function edit($SupplierId)
    {
        $supplier = $this->Supplier->find($SupplierId)->toArray();
        //dd($permission);

        return view('admin.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     * @param MenuRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->Supplier->updateSupplier($request->all(),$id);
        return redirect('admin/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->Supplier->delete($id);
      return redirect('admin/supplier');
    }

    public function ajaxIndex(Request $request)
    {

        $result = $this->Supplier->ajaxIndex($request);
        return response()->json($result,JSON_UNESCAPED_UNICODE);
    }
}
