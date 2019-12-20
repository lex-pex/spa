<?php

namespace App\Events;

use App\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Queue\SerializesModels;

class AddArticleSpaEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance
     */
    public function __construct()
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('feed');
    }
}


/*

public $id;
    public $title;
    public $text;
    public $created_at;
    public $updated_at;

    /**
     * Create a new event instance.
     *
     * @param int $id
     * @param string $title
     * @param string $text
     * @param $created_at
     * @param $updated_at

public function __construct(int $id, string $title, string $text, string $created_at, string $updated_at)
{
    $this->id = $id;
    $this->title = $title;
    $this->text = $text;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
}

 */


















