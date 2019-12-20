<?php

namespace App\Providers;

use function foo\func;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\AddArticleEvent' => [
            'App\Listeners\AddArticleListener'
        ],
        'App\Events\AddArticleSpaEvent' => [
            'App\Listeners\AddArticleSpaListener'
        ],
        'App\Events\TaskEvent' => [
            'App\Listeners\TaskListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    // outdated method
    //    public function boot(DispatcherContract $events)
    public function boot()
    {
        parent::boot();

        // Register the Event Handler:
        /* outdated method
        $events->listen('onAddArticleEvent', function ($article, $user) {
            Log::info('Manually fire up event: ', [$user->name => $article->title]);
        });

//      Event::listen('event.onAddArticleEvent', function ($article, $user) {
//      Event::listen('event.name', function ($onAddArticleEvent) {
        Event::listen('App\Events\AddArticleEvent', function ($onAddArticleEvent) {
            Log::info(
                'Manually fire up event in EventServiceProvider::boot(): ',
                [$onAddArticleEvent->user_name => $onAddArticleEvent->article_title]
            );
        });
        */

    }
}













