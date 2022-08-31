<?php

namespace App\Providers;

use App\Events\CarSaved;
use App\Events\ModelDeleted;
use App\Events\ModelSaved;
use App\Listeners\DeleteModelSearchText;
use App\Listeners\GenerateModelSearchText;
use App\Listeners\VoyagerBreadDataSave;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        // Voyager Admin Custom Listeners
        BreadDataAdded::class => [
            VoyagerBreadDataSave::class,
        ],
        BreadDataUpdated::class => [
            VoyagerBreadDataSave::class,
        ],
        ModelSaved::class => [
            GenerateModelSearchText::class,
        ],
        ModelDeleted::class => [
            DeleteModelSearchText::class,
        ],
        CarSaved::class => [
            GenerateModelSearchText::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
