
@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">增加权限</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="
                             @if($page_type == 'edit')
                            {{url('/admin/premission/'.$Premission->id.'/editStore')}}
                            @else
                            {{url('/admin/premission/store')}}
                            @endif
                                    " method="POST">
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label >权限名</label>
                                        <input type="hidden" class="form-control" name="id"
                                        {{--判断是否为修改页面--}}
                                               value =
                                                @if($page_type == 'edit')
                                                    {{$Premission->id}}
                                                @endif
                                        >
                                        <input type="text" class="form-control" name="name"
                                        {{--判断是否为修改页面--}}
                                               value =
                                                @if($page_type == 'edit')
                                                    {{$Premission->name}}
                                                @endif
                                        >
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>描述</label>
                                        <input type="text" class="form-control" name="desc"
                                               value =
                                                @if($page_type == 'edit')
                                                    {{$Premission->desc}}
                                                @endif
                                        >
                                    </div>
                                </div>
                                @include('layout.error')
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection