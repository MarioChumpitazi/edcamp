<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $fillable =[
        "type",
        "cost",
        "active"
    ];
}
