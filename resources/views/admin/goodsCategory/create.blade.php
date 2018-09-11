@extends('admin.layouts.admin')

@section('admin-css')
    <link href="{{ asset('asset_admin/assets/plugins/parsley/src/parsley.css') }}" rel="stylesheet" />
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
        <h1 class="page-header">新增分类 <small>header small text goes here...</small></h1>
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
                        <form class="form-horizontal form-bordered" data-parsley-validate="true" action="{{ url('admin/goodsCategory') }}" method="POST">
                            {{ csrf_field() }}
                             <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="icon"> 上级分类* :</label>
                                <div class="col-md-6 col-sm-6">
                                    <select name="ParentId" class="form-control selectpicker"
                                            data-live-search="true"
                                            data-style="btn-white"
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#parent_id_error1"
                                            data-parsley-required-message="请选择上级分类类"
                                            name="parent_id">
                                        <option value="0">-- 顶级分类 --</option>

                                        @foreach($category as $cat)
                                              <option value="{{ $cat->CategoryId }}">{{ $cat->CategoryName }}</option>
                                          @endforeach
                                    </select>
                                   {{-- @if(auth('admin')->user()->can('goodsCategory.add'))
                                        <a href="{{ url('admin/goodsCategory/create') }}">
                                            <button type="button" class="btn btn-primary m-r-5 m-b-5"><i class="fa fa-plus-square-o"></i> 新增</button>
                                        </a>
                                    @endif--}}
                                    <p id="parent_id_error1"></p>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4" for="CategoryName">分类名称 * :</label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="CategoryName" placeholder="CategoryName" data-parsley-required="true" data-parsley-required-message="分类名称" value="{{ old('CategoryName') }}"/>
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
{{--    <script src="{{ asset('asset_admin/assets/plugins/jquery/jquery-1.8.2.min.js') }}"></script>--}}
    <script src="{{ asset('asset_admin/assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script>
      $(function () {

          $("#type-option").on('change',function () {
              var categoryType=$(this).val();
              $.ajax({
                  type:'get',
                  url: '{{ url('admin/goodsCategory/ajax') }}',
                  data:'type='+categoryType+'',
                  dataType: 'json',
                  success: function (backdate) {
                      alert(backdate);
                  }
              })
          })

      })
    </script>
@endsection