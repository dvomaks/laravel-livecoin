<?php

namespace Dvomaks\Livecoin;

use Illuminate\Support\ServiceProvider;

class LivecoinServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->handleConfigs();
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('livecoin',function ($app){
            return new LivecoinManager;
        });
    }

    private function handleConfigs() {
        $configPath = __DIR__ . '/../config/livecoin.php';
        $this->publishes([$configPath => config_path('livecoin.php')]);
        $this->mergeConfigFrom($configPath, 'livecoin');
    }
}