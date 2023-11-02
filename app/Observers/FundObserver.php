<?php

namespace App\Observers;

use App\Events\DuplicateFundWarning;
use App\Models\Fund;

class FundObserver
{

    public function created(Fund $fund)
    {
        // check if the manager and name are the same in an existent fund
        // or a manager and an alias are the same in an existent fund
        // understanding that not only the name or aliases needs to match
        // also the manager to consider a duplicated fund
        $existingFund = Fund::where('manager_id', $fund->manager_id)
            ->where(function ($query) use ($fund) {
                $query->where('name', $fund->name)
                    ->orWhereJsonContains('aliases', $fund->name);
            })
            ->where('id', '<>', $fund->getKey())
            ->first();

        if ($existingFund) {
            event(new DuplicateFundWarning($existingFund, $fund));
        }
    }
}
