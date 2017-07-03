<?php

namespace Modules\MediaLinkExample\Repositories\Cache;

use Modules\MediaLinkExample\Repositories\AuthorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAuthorDecorator extends BaseCacheDecorator implements AuthorRepository
{
    public function __construct(AuthorRepository $author)
    {
        parent::__construct();
        $this->entityName = 'MediaLinkExample.authors';
        $this->repository = $author;
    }
}
