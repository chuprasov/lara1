<?php

namespace App\Providers;

use App\Services\Verbox\chatMessage;
use App\Services\Verbox\ChatMessageInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ChatMessageInterface::class, function () {
            return new chatMessage();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /* \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params){
            echo '<div>';
            var_dump($query);
            var_dump($params);
            echo '<hr>';
            echo '</div>';
        }); */
    }
}
