<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CustomerNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    public $cust;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($cust)
    {
        // dd($cust);
        $this->cust = $cust;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notif-channel');
    }

    public function broadcastAs()
    {
        return 'cust-inserted';
    }

    // public function broadcastWith()
    // {
    //     return [
    //         'cust' => $this->post->toArray()
    //     ];
    // }


}
