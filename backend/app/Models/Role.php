<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function permisos()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
