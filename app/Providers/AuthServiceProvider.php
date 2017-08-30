<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    public function boot()
    {
        $this->registerPolicies();

        //权限的注册
        $premissions = \App\AdminPremission::all();
//        $premissions = \App\AdminPremission::with('roles')->get();
//                dd($premissions);
        foreach($premissions as $premission){
            Gate::define($premission->name,function($user) use($premission){
                return $user->hasPremission($premission);
            });
        }
    }
}
