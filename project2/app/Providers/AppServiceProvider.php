<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\Student;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\View\View as ViewView;

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
        View::share('key', 'value');
        view()->composer('*', function ($view) {
            $view->with([
                'student_count' => Student::where('available', 0)->count(),
                'bill_count' => Bill::where('status', 0)->count(),
            ]);
        });
    }
}
