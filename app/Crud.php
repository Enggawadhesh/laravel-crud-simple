<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = [
    //added for fillable in db
        'foo', 'bar',
    ];
}
