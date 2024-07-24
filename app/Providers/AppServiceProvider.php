<?php

namespace App\Providers;

use App\Repository\Detartment_Head_interface;
use App\Repository\Detartment_Head_Repository;
use App\Repository\favourite__news_interface;
use App\Repository\favourite__news_Repository;
use App\Repository\New_interface;
use App\Repository\news_type_interface;
use App\Repository\news_type_Repository;
use App\Repository\subject_interface;
use App\Repository\subject_Repository;
use App\Repository\subject_type_interface;
use App\Repository\subject_type_Repository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(subject_interface::class,subject_Repository::class);
        $this->app->bind(subject_type_interface::class,subject_type_Repository::class);
        $this->app->bind(Detartment_Head_interface::class,Detartment_Head_Repository::class);
        $this->app->bind(news_type_interface::class,news_type_Repository::class);
        $this->app->bind(New_interface::class,news_type_Repository::class);
        $this->app->bind(favourite__news_interface::class,favourite__news_Repository::class);
    }
}
