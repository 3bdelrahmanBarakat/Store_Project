<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if(!app()->runningInConsole())
        {
            $setting = Setting::firstOr(function(){
                return Setting::create([
                    'name' => 'site_name',
                    'description' => 'laravel'
                ]);
            });

            view()->share('setting',$setting);
        }
    }
}
