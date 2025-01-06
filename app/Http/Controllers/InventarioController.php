<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Requests\InventarioValidar;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::orderby('titulo')->get();
        return view('gestion de datos.inventario', [
            'inventarios' => $inventarios
        ]);
    }

    public function store(InventarioValidar $request)
    {
        Inventario::create($request->all());
        return redirect()->route('inventario');
    }

    public function update(InventarioValidar $request)
    {
        $inventario = Inventario::find($request->id_libro);
        $inventario->titulo = $request->titulo;
        $inventario->autor = $request->autor;
        $inventario->año = $request->año;
        $inventario->editorial = $request->editorial;
        $inventario->unidades = $request->unidades;
        $inventario->save();
        return redirect()->route('inventario');
    }

    public function destroy($id_libro)
    {
        $inventario = Inventario::find($id_libro);
        $inventario->delete();
        return redirect()->route('inventario');
    }
}