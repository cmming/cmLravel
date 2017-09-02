<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\AdminPremission;

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
//                dd($premission);
                return $user->hasPremission($premission);
            });
        }

        Gate::after(function ($user,$ability) {
//            $abilitys = AdminPremission::where('name','=',$ability);
////            $abilitys = AdminPremission::where('name','=',$ability);
////            //权限的名称 为 $ability
//            dd($ability,$abilitys->get(['id']),$user->roles);
////            dd($abilitys->getModel()->roles());
//            dd($user->isInRoles($abilitys->getModel()->roles));
//            dd($ability);
//            dd($this->authorizeForUser($user, $ability));
//            $this->authorizeForUser($user, $ability);
        });

    }
}
