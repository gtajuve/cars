<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $fillable = ['type', 'cc', 'numbers_of_cylinders', 'has_turbo'];

}
