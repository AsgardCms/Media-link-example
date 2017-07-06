<?php

namespace Modules\MediaLinkExample\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Author extends Model
{
    use MediaRelation;
    protected $table = 'medialinkexample__authors';
    protected $fillable = ['name'];

    public function getProfilePictureAttribute()
    {
        return $this->filesByZone('profile_image')->first();
    }
}
