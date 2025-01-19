<?php

namespace App\Http\Controllers;

use App\Models\ClientRequest;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:client_requests,email',
            'telefono' => 'required|string|max:15',
            'plan_deseado' => 'required|string',
            'comentarios' => 'nullable|string',
        ]);

        ClientRequest::create($request->all());

        return redirect()->back()->with('success', '¡Solicitud enviada correctamente! Nos pondremos en contacto contigo pronto.');
    }

    public function index()
    {
        $solicitudes = ClientRequest::where('estado', 'pendiente')->get();
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function updateEstado(Request $request, $id)
    {
        $solicitud = ClientRequest::findOrFail($id);
        $solicitud->estado = $request->estado;
        $solicitud->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente.');
    }
}
