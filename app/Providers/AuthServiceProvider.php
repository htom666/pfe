<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('isAdmin', function($user) {
        //    // dd($user->roles->name); //hethi dump role name db role
        //     $perm = DB::table('roles')
        //     ->where('name','=',$user->roles->name)
        //     ->select('permissions')
        //     ->get();
        //     foreach(json_decode($perm) as $sperm)
        //     {
        //         dd($sperm[1]);
        //     }
        //     //check role name exist db query first
        //     //if exsit foreach permession 

        //     return $user->roles->name == 'admin';
        //  });
                foreach (config('global.permissions') as $ability=>$value) {
            Gate::define($ability, function($auth)use($ability){
                return $auth->hasRole($ability);
            });
}
}
}