<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Muestra el panel principal del administrador.
     */
    public function dashboard()
    {
        return response()->json([
            'message' => 'Bienvenido al panel de administración',
            'secciones' => [
                'solicitudes' => '/api/admin/solicitudes',
                'empresas' => '/api/admin/empresas',
                'usuarios' => '/api/admin/usuarios',
                'configuracion' => '/api/admin/configuracion',
            ],
        ]);
    }
}
