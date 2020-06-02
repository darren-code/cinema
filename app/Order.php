<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['isPaid','total','method','time','user','id'];
    public $timestamps = false;
}
