<?php

namespace App\Events\Notifications;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Транслировать в канал - events
     *
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('events');
    }

    /**
     * Транслировать как - CreateNotification
     * при использовании в JS необходимо установить точку перед названием
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'CreateNotification';
    }
}
