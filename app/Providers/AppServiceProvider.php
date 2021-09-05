<?php

namespace App\Providers;

use App\Models\User;
use App\Services\NewsLetterService;
use Blade;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsLetterService::class, function () {
            return new NewsLetterService('hello there');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->user()?->can('admin');
        });

        Gate::define('admin', function (User $user) {
            return $user->email === 'sina.shariati@yahoo.com';
        });
    }
}
