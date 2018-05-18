<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    @foreach($basic_info['pannel'] as $pan)
        <li><a href="javascript:;">{{$pan}}</a></li>
    @endforeach
</ol>
<!-- begin page-header -->
<h1 class="page-header">{{$basic_info['title']}} <small>{{$basic_info['description']}}</small></h1>
<!-- end page-header -->