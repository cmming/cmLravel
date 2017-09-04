
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
                            <h3 class="box-title">邮件模版列表</h3>
                        </div>
                        <a type="button" class="btn " href="{{url('/admin/mails/create')}}">增加邮件模版</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>通知名称</th>
                                    <th>操作</th>
                                </tr>
                                @foreach($mails as $mail)
                                <tr>
                                    <td>{{$mail->id}}</td>
                                    <td>{{$mail->title}}</td>
                                    <td>
                                        <form action = "{{url('/admin/mails/'.$mail->id)}}"  method='post'>
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" delete-title = "{{$mail->title}}"  class="btn mail-delete">删除</button>
                                        </form>
                                        <a type="button" delete-title = "{{$mail->title}}"  class="btn mail-update" href="{{url('/admin/mails/'.$mail->id.'/edit')}}">编辑</a>
                                        <a type="button" delete-title = "{{$mail->title}}"  class="btn mail-update" href="{{url('/admin/sendEmail/'.$mail->id)}}">发送邮件</a>
                                    </td>
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