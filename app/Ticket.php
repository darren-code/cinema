<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['id', 'row','seat','cost','playing','transaction'];
    public $timestamps = false;
}
