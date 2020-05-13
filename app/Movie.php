<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    protected $fillable = ['title',
    'director',
    'avail',
    'released',
    'parental',
    'synopsis',
    'poster',
    'trailer'];
}
