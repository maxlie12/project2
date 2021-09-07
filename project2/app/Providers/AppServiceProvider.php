<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Relation::morphMap([
            'bill' => 'App\Models\Bill',
            'student' => 'App\Models\Student',
            'book' => 'App\Models\Book',
            'course' => 'App\Models\Course',
            'grade' => 'App\Models\Grade',
            'subject' => 'App\Models\Subject',
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
