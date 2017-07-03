<?php

namespace Modules\MediaLinkExample\Repositories\Eloquent;

use Modules\MediaLinkExample\Events\AuthorWasCreated;
use Modules\MediaLinkExample\Events\AuthorWasDeleted;
use Modules\MediaLinkExample\Events\AuthorWasUpdated;
use Modules\MediaLinkExample\Repositories\AuthorRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentAuthorRepository extends EloquentBaseRepository implements AuthorRepository
{
    public function create($data)
    {
        $author = $this->model->create($data);

        event(new AuthorWasCreated($author, $data));

        return $author;
    }

    public function update($author, $data)
    {
        $author->update($data);

        event(new AuthorWasUpdated($author, $data));

        return $author;
    }

    public function destroy($author)
    {
        event(new AuthorWasDeleted($author));

        return $author->delete();
    }

}
