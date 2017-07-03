<?php

namespace Modules\Medialinkexample\Repositories\Cache;

use Modules\Medialinkexample\Repositories\AuthorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAuthorDecorator extends BaseCacheDecorator implements AuthorRepository
{
    public function __construct(AuthorRepository $author)
    {
        parent::__construct();
        $this->entityName = 'medialinkexample.authors';
        $this->repository = $author;
    }
}
