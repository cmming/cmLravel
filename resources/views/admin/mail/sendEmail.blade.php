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
                                <h3 class="box-title">发送邮件</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/sendEmail')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">用户名称：</label>
                                    <div class="checkbox">
                                        @foreach($all_users as $all_user)
                                            <label>
                                                <input type="checkbox" name="users[]"
                                                       value="{{$all_user->id}}">
                                                {{$all_user->name}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">邮件的标题</label>
                                    <input type="text" class="form-control" id="name" placeholder="请输入名称" value="{{$mail->title}}">

                                </div>
                                <div class="form-group">
                                    <label for="name">邮件的内容</label>
                                    <input type="text" class="form-control" id="name" placeholder="请输入名称" value="{{$mail->content}}">
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">发送邮件</button>
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