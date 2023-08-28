<?php

namespace App\Providers;

use App\Models\KonfigurasiModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Lang;
use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
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
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new CustomVerifyEmailNotification($url))->toMail($notifiable);
        });

        $data_konfig = KonfigurasiModel::first();
        $data = array(
            'data_konfig' => $data_konfig,
        );

        View::share("service", $data);
    }
}
