<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class FundListener
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $existingFund = $event->existingFund;
        $newFund = $event->newFund;

        // log a warning message
        Log::warning("Duplicate fund warning: New fund (ID {$newFund->getKey()}) created with the same manager and name/alias than existent fund (ID {$existingFund->getKey()})");
    }
}
