
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
                            <form role="form" action="{{url($formParams['url'])}}"
                                  @if(!$formParams['isEdit'])
                                  method="{{$formParams['method']}}">
                                @else
                                          method="post">
                                        {{method_field($formParams['method'])}}
                                    @endif
                                {{csrf_field()}}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">标题</label>
                                        <input type="text" class="form-control" name="title"
                                               value =
                                        @if($formParams['isEdit'])
                                            {{$formParams['params']['title']}}
                                                @endif
                                        >
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">内容</label>
                                        <textarea class="form-control" name="content">@if($formParams['isEdit']){{$formParams['params']['content']}}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>
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