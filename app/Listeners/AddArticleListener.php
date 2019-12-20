<?php

namespace App\Listeners;

use App\Events\AddArticleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class AddArticleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event. "Publish the Message"
     *
     * @param  AddArticleEvent  $event
     * @return void
     */
    public function handle(AddArticleEvent $event)
    {
//        $event->user_name;
//        $event->article_title;
//        Log::notice('');
        Log::info('Article save in database', [$event->user_name => $event->article_title]);

    }
}
