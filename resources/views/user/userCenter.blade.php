@extends("layout.main")
@section("content")
    <div class="blog-header">
    </div>

    <div class="row">

        <div class="col-sm-8">
            <blockquote>
                <p><img src="" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
                </p>
                <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
            </blockquote>
            @include('layout.likeBtn',['target_user'=>$user])
        </div>

        <div class="col-sm-8 blog-main">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @foreach($posts as $post)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class="">
                                    <a href="{{url('/posts/'.$post->id)}}">{!! str_limit($post->title,10)!!}</a>
                                    {{$post->created_at->diffForHumans()}}</p>
                                <p class="">
                                    <a href={{url('/user/'.$post->user->id)}}>{{$post->user->name}}</a>
                                </p>
                                <p>
                                <p>{!!str_limit($post->content,80) !!}</p>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @foreach($susers as $suser)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class=""><a href="{{url('/user/'.$suser->id)}}">{{$suser->name}}</a></p>
                                <p class="">关注：{{$suser->stars_count}} | 粉丝：{{$suser->fans_count}}｜
                                    文章：{{$suser->posts_count}}</p>
                                <div>
{{--                                    @include('layout.likeBtn',['target_user'=>$suser])--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        @foreach($fusers as $fuser)
                            <div class="blog-post" style="margin-top: 30px">
                                <p class=""><a href="{{url('/user/'.$fuser->id)}}">{{$fuser->name}}</a></p>
                                <p class="">关注：{{$fuser->stars_count}} | 粉丝：{{$fuser->fans_count}}｜
                                    文章：{{$fuser->posts_count}}</p>
                                <div>
{{--                                    @include('layout.likeBtn',['target_user'=>$fuser])--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>


        </div><!-- /.blog-main -->
@endsection

