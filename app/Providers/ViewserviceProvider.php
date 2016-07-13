<?php

namespace App\Providers;

use App\Http\Viewcomposers\MakeModelForm;
use Illuminate\Support\ServiceProvider;


class ViewserviceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //


        $this->app->make('view')->composer(
            ['components/dropdowns'],
            MakeModelForm::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
