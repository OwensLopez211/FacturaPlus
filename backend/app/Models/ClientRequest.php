<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'plan_deseado',
        'comentarios',
        'estado',
    ];
}
