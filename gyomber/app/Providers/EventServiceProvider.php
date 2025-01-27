<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Dolgozo;
use App\Observers\DolgozoObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * A szolgáltató bootolásakor fut le.
     *
     * @return void
     */
    public function boot()
    {
        // Az observer regisztrálása a Dolgozo modellhez
        Dolgozo::observe(DolgozoObserver::class);
    }
}
