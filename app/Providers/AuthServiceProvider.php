<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('category-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-category'));
            //dd($user);
        });*/
        Gate::define('category-list', 'App\Policies\LoaiSanPhamPolicy@view');
        Gate::define('category-add', 'App\Policies\LoaiSanPhamPolicy@create');
        Gate::define('category-update', 'App\Policies\LoaiSanPhamPolicy@update');
        Gate::define('category-delete', 'App\Policies\LoaiSanPhamPolicy@delete');


        Gate::define('branch-list', 'App\Policies\HangSanXuatPolicy@view');
        Gate::define('branch-add', 'App\Policies\HangSanXuatPolicy@create');
        Gate::define('branch-update', 'App\Policies\HangSanXuatPolicy@update');
        Gate::define('branch-delete', 'App\Policies\HangSanXuatPolicy@delete');

        Gate::define('product-list', 'App\Policies\SanPhamPolicy@view');
        Gate::define('product-add', 'App\Policies\SanPhamPolicy@create');
        Gate::define('product-update', 'App\Policies\SanPhamPolicy@update');
        Gate::define('product-delete', 'App\Policies\SanPhamPolicy@delete');
        Gate::define('product-detail', 'App\Policies\SanPhamPolicy@detail');

        Gate::define('slider-list', 'App\Policies\SliderPolicy@view');
        Gate::define('slider-add', 'App\Policies\SliderPolicy@create');
        Gate::define('slider-update', 'App\Policies\SliderPolicy@update');
        Gate::define('slider-delete', 'App\Policies\SliderPolicy@delete');

        Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-add', 'App\Policies\UserPolicy@create');
        Gate::define('user-update', 'App\Policies\UserPolicy@update');
        Gate::define('user-delete', 'App\Policies\UserPolicy@delete');

        Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-add', 'App\Policies\RolePolicy@create');
        Gate::define('role-update', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');

    }
}
