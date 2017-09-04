<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\AdminPremission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // 将策略类注册到模型中
        // 'App\Post' => 'App\Policies\PostPolicy.php',
        'App\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //权限的注册
        $premissions = \App\AdminPremission::all();
//        $premissions = \App\AdminPremission::with('roles')->get();
//                dd($premissions);
        foreach($premissions as $premission){
            Gate::define($premission->name,function($user) use($premission){
//                dd($premission);
                return $user->hasPremission($premission);
            });
        }

//        Gate::after(function ($user,$ability){
//            //这里面 找到的是 一个集合对象 （注意 会有key ）
//            $premission = AdminPremission::where('name','=',$ability)->first();
//            //判断用户的是否 拥有该权限
//            $is_can = $user->hasPremission($premission);
//            if(!$is_can){
//                return \App::abort('404');
//            }
//        });

    }
}
