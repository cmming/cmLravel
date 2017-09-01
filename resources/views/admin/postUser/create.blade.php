
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
                                <h3 class="box-title">{{$formParams['title']}}</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            {{--{{dd($formParams['url'])}}--}}
                            <form role="form" action="{{url($formParams['url'])}}" method="post">
                                {{csrf_field()}}
                                @if($formParams['isEdit'])
                                    {{ method_field($formParams['method']) }}
                                    @endif
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">用户名</label>
                                        <input type="text" class="form-control" name="name"
                                               value=
                                        @if($formParams['isEdit'])
                                            {{$formParams['params']['name']}}
                                                @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">邮箱</label>
                                        <input type="text" class="form-control" name="email"
                                               value=
                                        @if($formParams['isEdit'])
                                            {{$formParams['params']['email']}}
                                                @endif
                                        >
                                    </div>
                                    @if(!$formParams['isEdit'])
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">密码</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only">重复密码</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="重复输入密码"/>
                                    </div>
                                    @endif
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