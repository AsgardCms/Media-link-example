<?php

namespace Modules\Medialinkexample\Events;

use Modules\Media\Contracts\DeletingMedia;
use Modules\Medialinkexample\Entities\Author;

class AuthorWasDeleted implements DeletingMedia
{
    /**
     * @var Author
     */
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->author->id;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->author);
    }
}
