<?php


namespace RahmatWaisi\PoL\Providers;


use Illuminate\Support\ServiceProvider;

class PoLServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/pol.php');
    }
}
