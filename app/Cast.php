<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $table = 'casts';
    public $timestamps = false;
    protected $fillable = ['name','birthplace','birthdate'];
}

