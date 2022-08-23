<?php

namespace App\Providers;

use App\Helpers\LogToChannels;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Queue::before(function (JobProcessing $event) {
            (new LogToChannels())->notice('Job',
                "Job - ".$event->job->resolveName() . " started");

        });

        Queue::after(function (JobProcessed $event) {
            (new LogToChannels())->notice('Job',
                "Job - ".$event->job->resolveName() . " done");
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
