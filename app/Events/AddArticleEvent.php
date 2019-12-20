<?php

namespace App\Events;

use App\Article;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddArticleEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user_name;
    public $article_title;

    /**
     * Create a new event instance
     */
    public function __construct(Article $article, User $user)
    {
        $this->user_name = $user->name;
        $this->article_title = $article->title;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

}
