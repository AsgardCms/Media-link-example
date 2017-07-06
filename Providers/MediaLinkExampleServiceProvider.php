<?php

namespace Modules\MediaLinkExample\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Media\Image\ThumbnailManager;

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

        $this->app[ThumbnailManager::class]->registerThumbnail('miniProfileThumb', [
            'resize' => [
                'width' => 100,
                'height' => null,
                'callback' => function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                },
            ],
        ]);
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
