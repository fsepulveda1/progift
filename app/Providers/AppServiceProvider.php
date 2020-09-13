<?php

namespace App\Providers;

use App\Actions\ChangeStatusAction;
use App\Actions\ShowCommentsAction;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

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
        Voyager::addAction(ChangeStatusAction::class);
        Voyager::addAction(ShowCommentsAction::class);
    }

}
