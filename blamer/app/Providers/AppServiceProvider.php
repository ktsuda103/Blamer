<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Point;
use Illuminate\Support\Facades\Schema;

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
            if(empty($user)){
                $user = ['id'=>0];
            }
            $point_model = new Point();
            $point = $point_model->get_point($user['id']);
            if(empty($point)){
                $point = ['point'=>0];
            }
            $view->with('user',$user)->with('point',$point);
        });
    }
}
