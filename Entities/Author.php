<?php

namespace Modules\MediaLinkExample\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Author extends Model
{
    use MediaRelation;
    protected $table = 'MediaLinkExample__authors';
    protected $fillable = ['name'];
}
