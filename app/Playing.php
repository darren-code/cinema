<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playing extends Model
{
    protected $table = 'playing_relation';
    public $timestamps = false;
    protected $fillable = ['studio','movie','showtime','branch'];
}

