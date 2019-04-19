<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $diskusi_id;
    public $member;
    public $date;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $diskusi_id, $member, $date)
    {        
        $this->message = $message;
        $this->diskusi_id = $diskusi_id;
        $this->member = $member;
        $this->date = $date;
    } 

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('discuss-channel');
    }

    public function broadcastAs()
    {
        return 'message-sent';
    }
}
