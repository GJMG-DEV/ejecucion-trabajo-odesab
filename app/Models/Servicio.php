<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table="servicios";

    protected $guarded=['id','created_at','updatet_at'];
}
