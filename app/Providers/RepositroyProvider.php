<?php

namespace App\Providers;

use App\Interface\AlbumInterface;
use App\Interface\TicketInterface;
use App\Repository\AlbumRepository;
use App\Repository\TicketRepository;
use Illuminate\Support\ServiceProvider;

class RepositroyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TicketInterface::class,TicketRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
