@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_admin/assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
@endsection

@section('admin-content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Form Stuff</a></li>
            <li class="active">Form Validation</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">修改供货商 <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Basic Form Validation</h4>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body panel-form">
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" action="{{ url('admin/supplier/'.$supplier['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="SupplierCompany">供货商名称 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="SupplierCompany" placeholder="名称" data-parsley-required="true" data-parsley-required-message="请输入名称" value="{{ $supplier['SupplierCompany'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="SupplierName">法人代表 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="SupplierName" placeholder="法人代表" data-parsley-required="true" data-parsley-required-message="请输入厂商代表" value="{{ $supplier['SupplierName'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="SupplierNumber">联系方式 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="SupplierNumber" placeholder="联系方式" data-parsley-required="true" data-parsley-required-message="请输入联系方式" value="{{ $supplier['SupplierNumber'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="icon">厂商地址 * :</label>
                                <div class="col-md-6 col-sm-6" id="distpicker" data-toggle="distpicker">

                                    <label class="sr-only" for="province">Province</label>
                                    <select class="form-control" id="province" name="province"
                                            style="width:30%;float:left;"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#city_error_message"
                                            data-parsley-required-message="请选择省份"  >

                                    </select>


                                    <label class="sr-only" for="city">City</label>
                                    <select class="form-control" style="width:30%;float:left;" id="city" name="city"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#city_error_message"
                                            data-parsley-required-message="请选择城市" >

                                    </select>


                                    <label class="sr-only" for="district">District</label>
                                    <select class="form-control" style="width:30%;float:left;" id="district" name="district"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#city_error_message"
                                            data-parsley-required-message="请选择区域" >

                                    </select>
                                    <p id="city_error_message"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="DetailAddress">详细地址 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="DetailAddress" placeholder="详细地址" data-parsley-required="true" data-parsley-required-message="地址不能为空" value="{{ $supplier['DetailAddress'] }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4"></label>
                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
@endsection

@section('admin-js')
    <script src="{{ asset('asset_admin/assets/plugins/parsley/dist/parsley.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/jquery/jquery-1.8.2.min.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/distpicker/distpicker.data.js') }}"></script>
    <script src="{{ asset('asset_admin/assets/plugins/distpicker/distpicker.js') }}"></script>
    <script>
        $("#distpicker").distpicker({
         province: "{{$supplier['province']}}",
        city:"{{$supplier['city']}}",
        district: "{{$supplier['district']}}"
        });
    </script>

@endsection