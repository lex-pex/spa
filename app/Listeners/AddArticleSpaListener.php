<?php

namespace App\Listeners;

use App\Events\AddArticleSpaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddArticleSpaListener
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
     * Handle the event.
     *
     * @param  AddArticleSpaEvent  $event
     * @return void
     */
    public function handle(AddArticleSpaEvent $event)
    {
        //
    }
}
