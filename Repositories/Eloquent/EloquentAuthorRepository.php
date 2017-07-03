<?php

namespace Modules\Medialinkexample\Repositories\Eloquent;

use Modules\Medialinkexample\Events\AuthorWasCreated;
use Modules\Medialinkexample\Events\AuthorWasDeleted;
use Modules\Medialinkexample\Events\AuthorWasUpdated;
use Modules\Medialinkexample\Repositories\AuthorRepository;
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
