<?php

namespace Modules\Medialinkexample\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class MedialinkexampleServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->publishConfig('medialinkexample', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Medialinkexample\Repositories\AuthorRepository',
            function () {
                $repository = new \Modules\Medialinkexample\Repositories\Eloquent\EloquentAuthorRepository(new \Modules\Medialinkexample\Entities\Author());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Medialinkexample\Repositories\Cache\CacheAuthorDecorator($repository);
            }
        );
// add bindings

    }
}
