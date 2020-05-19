<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    public $timestamps = false;
    protected $fillable = ['location',
    'country',
    'state',
    'province',
    'town',
    'zip_code',
    'address'];
}

