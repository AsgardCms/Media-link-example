<?php

namespace Modules\MediaLinkExample\Events;

use Modules\Media\Contracts\StoringMedia;
use Modules\MediaLinkExample\Entities\Author;

class AuthorWasUpdated implements StoringMedia
{
    /**
     * @var Author
     */
    private $author;
    /**
     * @var array
     */
    private $data;

    public function __construct(Author $author, array $data)
    {
        $this->author = $author;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->author;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
