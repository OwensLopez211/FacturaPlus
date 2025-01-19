<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; // Para eliminaciones suaves
use Illuminate\Database\Eloquent\Factories\HasFactory; // Para usar factories

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'rut',        // Nuevo campo
        'password',
        'empresa_id', // Relación con la empresa
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación con el modelo Empresa
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    /**
     * Relación con roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Verifica si el usuario tiene un rol específico
     */
    public function tieneRol($nombreRol)
    {
        return $this->roles->contains('nombre', $nombreRol);
    }

    /**
     * Verifica si el usuario tiene un permiso específico
     */
    public function tienePermiso($permiso)
    {
        foreach ($this->roles as $rol) {
            if ($rol->permisos->contains('nombre', $permiso)) {
                return true;
            }
        }
        return false;
    }
}
