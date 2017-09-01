
@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">文章用户列表</h3>
                        </div>
                        <a type="button" class="btn " href="{{url('/admin/postUsers/create')}}">增加用户</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>用户名称</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($postUsers as $postUser)
                                    <tr>
                                        <td>{{$postUser->id}}</td>
                                        <td>{{$postUser->name}}</td>
                                        <td>
                                            <a type="button" class="btn" href="{{url('/admin/postUsers/'.$postUser->id.'/role')}}" >角色管理</a>
                                            <a type="button" class="btn" href="{{url('/admin/postUsers/'.$postUser->id.'/edit')}}" >修改信息</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody></table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection