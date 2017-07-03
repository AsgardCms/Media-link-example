<?php

namespace Modules\MediaLinkExample\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class MediaLinkExampleServiceProvider extends ServiceProvider
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
        $this->publishConfig('MediaLinkExample', 'permissions');
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
            'Modules\MediaLinkExample\Repositories\AuthorRepository',
            function () {
                $repository = new \Modules\MediaLinkExample\Repositories\Eloquent\EloquentAuthorRepository(new \Modules\MediaLinkExample\Entities\Author());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\MediaLinkExample\Repositories\Cache\CacheAuthorDecorator($repository);
            }
        );
// add bindings

    }
}
