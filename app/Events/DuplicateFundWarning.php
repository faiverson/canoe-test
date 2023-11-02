<?php

namespace App\Events;

use App\Models\Fund;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class DuplicateFundWarning
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $existingFund;

    public $newFund;

    /**
     * Create a new event instance.
     */
    public function __construct(Fund $existingFund, Fund $newFund)
    {
        $this->existingFund = $existingFund;
        $this->newFund = $newFund;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

