<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['row','seat','cost','playing','transaction'];
    // protected $guarded = [];
    public $timestamps = false;
}
