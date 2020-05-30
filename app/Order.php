<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['isPaid'];
    public $timestamps = false;
}
