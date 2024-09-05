<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    use HasFactory;

    protected $fillable =[
      'nombre',
      'fecha_inicio',
      'responsable',
      'monto',
      'activo',
      'user_id',
    ];

}
