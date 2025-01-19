<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Almacena una nueva empresa y crea un usuario administrador.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rut' => 'required|string|unique:empresas',
            'nombre_admin' => 'required|string|max:255',
            'email_admin' => 'required|email|unique:users,email',
            'password_admin' => 'required|string|min:8',
        ]);

        // Crear la empresa
        $empresa = Empresa::create([
            'nombre' => $request->nombre,
            'rut' => $request->rut,
            // Agrega otros campos necesarios para la empresa
        ]);

        // Crear el usuario administrador asociado
        User::create([
            'nombre' => $request->nombre_admin,
            'email' => $request->email_admin,
            'password' => bcrypt($request->password_admin),
            'empresa_id' => $empresa->id,
        ]);

        return redirect()->back()->with('success', 'Empresa y administrador creados con éxito.');
    }
}
