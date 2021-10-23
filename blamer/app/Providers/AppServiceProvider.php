<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Point;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        view()->composer('*', function($view){
            $user = \Auth::user();
            $point_model = new Point();
            $point = $point_model->get_point($user['id']);
            $view->with('user',$user)->with('point',$point);
        });
    }
}
