<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['movie_title','seat_num'];
    // protected $guarded = [];
}
