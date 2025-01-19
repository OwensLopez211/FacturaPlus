<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'razon_social',
        'rut',
        'direccion',
        'ciudad',
        'region',
        'codigo_postal',
        'telefono',
        'email_contacto',
        'logo',
        'website',
        'giro',
        'activa',
        'fecha_inicio',
        'certificado_digital',
        'clave_certificado',
        'facturacion_electronica',
        'configuracion',
    ];

    protected $casts = [
        'configuracion' => 'array',
        'activa' => 'boolean',
        'facturacion_electronica' => 'boolean',
        'fecha_inicio' => 'date',
    ];

    /**
     * Relación con el modelo usuario
     */
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}
