<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
     protected $table='Datos';

     protected $casts = [
         'Total_Db' => 'integer',
     ];
}
