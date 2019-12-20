<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Eloquent models fire several events, allowing you to
        // hook into the following points in a model's lifecycle:
        // retrieved, creating, created, updating, updated, saving,
        // saved, deleting, deleted, restoring, restored.

        Article::creating(function(){
            Log::info(
                'Model creating event: ',
                ['Test Key' => '...test message...']
            );
        });

        Article::created(function(Article $article) {
            Log::info(
                'Model fires up event: ',
                ['User Admin' => $article->title]
            );
        });

    }
}
