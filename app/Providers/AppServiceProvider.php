<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
{
    $this->app->bind('path.public', function() {
        return base_path('../public_html');
    });
}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

         View::composer('layouts.admin', function ($view) {
        $footer= DB::table('websetting')->select('*')->first();
        $view->with(['footer'=>$footer]);
         });
         
         View::composer('layouts.logindesign', function ($view) {
        $footer= DB::table('websetting')->select('*')->first();
        $view->with(['footer'=>$footer]);
        
         });
         
          View::composer('layouts.nav', function ($view) {
        $footer= DB::table('websetting')->select('*')->first();
        $view->with(['footer'=>$footer]);
        
      
        
         });

         View::composer('layouts.nav2', function ($view) {
            $footer= DB::table('websetting')->select('*')->first();
            $view->with(['footer'=>$footer]);
        });
         
         
           View::composer('layouts.front_layouts', function ($view) {
        $footer= DB::table('websetting')->select('*')->first();
        $view->with(['footer'=>$footer]);
        
           });
    }
}
