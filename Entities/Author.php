<?php

namespace Modules\Medialinkexample\Entities;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'medialinkexample__authors';
    protected $fillable = ['name'];
}
