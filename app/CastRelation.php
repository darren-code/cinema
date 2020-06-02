<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CastRelation extends Model
{
    protected $table = 'cast_relation';
    public $timestamps = false;
    protected $fillable = ['cast','movie','id'];
}

