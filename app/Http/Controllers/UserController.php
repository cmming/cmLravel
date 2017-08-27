<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户中心的显示页面
    public function index(User $user)
    {
        //用户的 登录权限控制
        \Auth::check();
        // dd($user);
        if(!\Auth::check()){

            return redirect("/login")->withErrors("请登录！");
        }

        // 获取 关注数 粉丝数 文章数
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);

        // 获取用户的 前10 个文章
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();
        // dd($user);
        // 获取关注 用户数
        $stars = $user->stars;
        // 获取关注用户的 关注数 粉丝数 文章数
        $susers = User::whereIn('id', $stars->pluck('start_id'))->withCount(['stars', 'fans', 'posts'])->get();

        //获取粉丝用户
        $fans = $user->fans;
        $fusers =User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();

        return view('user/userCenter', compact('user', 'posts','susers','fusers'));
    }

    public function fan(User $user){
        $me = \Auth::user();
        $me->doFan($user->id);

        return [
            'error'=>0,
            'msg'=>''
        ];
    }
    public function unFan(User $user){
        $me = \Auth::user();
        $me->doUnFan($user->id);

        return [
            'error'=>0,
            'msg'=>''
        ];
    }

    // 设置 中心 的渲染 页面
    public function setting()
    {
        return view('user/userSetting');
    }

    // 设置的逻辑页面
    public function settingStore()
    {
    }
}
