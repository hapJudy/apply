@extends('admin.layouts.admin')

@section('admin-content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        @include('admin.layouts.top-menu')
        <!-- end breadcrumb -->


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">基本信息</h4>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><span>服务器版本:</span><span>Apache 2.4.23 </span></li>
                            <li><span>数据库版本:</span><span>mysql 5.0.12 </span></li>
                            <li><span>PHP版本:</span><span>PHP Version 7.1.13 </span></li>
                            <li><span>Laravel框架说明:</span><span style="letter-spacing:inherit;">Laravel是一套简洁、优雅的PHP Web开发框架(PHP Web Framework)。它可以让你从面条一样杂乱的代码中解脱出来；它可以帮你构建一个完美的网络APP，而且每行代码都可以简洁、富于表达力。 在Laravel中已经具有了一套高级的PHP ActiveRecord实现 -- Eloquent ORM。它能方便的将“约束（constraints）”应用到关系的双方，这样你就具有了对数据的完全控制，而且享受到ActiveRecord的所有便利。Eloquent原生支持Fluent中查询构造器（query-builder）的所有方法  </span></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection