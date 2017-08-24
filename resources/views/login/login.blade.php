
 @extends('layout.loginAndReg')
 @section("content")
 
<form class="form-signin" method="POST" action="{{url('/login')}}">
        {{csrf_field()}}
        <h2 class="form-signin-heading">请登录</h2>
        <label for="inputEmail" class="sr-only">邮箱</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="is_remember"> 记住我
            </label>
        </div>

        @include('layout.error')
                <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        <a href="{{url('/register')}}" class="btn btn-lg btn-primary btn-block" type="submit">去注册>></a>
    </form>
@endsection