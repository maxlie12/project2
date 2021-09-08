<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(
            'profile', // view name
            'App\Libraries\ViewComposers\CategoryComposer' // composer class name
        );

        // multiple view bind
        View::composer(
            [
                'student',
                'book',
                'bill',
                'grade'
                //... more if you want
            ],
            'App\Libraries\ViewComposers\CategoryComposer' // class name
        );
    }
}
