<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AcademicoSettingInterface;
use App\Repositories\AcademicoSettingRepository;

class AcademicoSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AcademicoSettingInterface::class, AcademicoSettingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
