<?php

namespace App\Providers;

use App\Models\KonfigurasiModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $data_konfig = KonfigurasiModel::first();
        $data = array(
            'data_konfig' => $data_konfig,
        );

        View::share("service", $data);
    }
}
