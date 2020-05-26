<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreRelation extends Model
{
    protected $table = 'genre_relation';
    public $timestamps = false;
    protected $fillable = ['genre','movie'];
}

