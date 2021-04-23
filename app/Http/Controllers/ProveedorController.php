<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::orderBy('nombre');
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Proveedor::create($request->all());
        return redirect()->route('proveedores.index');
        // $request->validate([
        //     'nombre'=>'required|string|max:255',
        //     'apellidos'=>'required|string|max:255',
        //     'email'=>'required|email|string|max:200|unique:proveedors',
        //     'direccion'=>'nullable|string|max:255',
        //     'telefono'=>'required|string|max:9|min:9',
        // ]);

        // $categoria = new Proveedor();
        // $categoria->nombre = strtoupper($request->nombre);
        // $categoria->apellidos = strtoupper($request->apellidos);
        // $categoria->email = $request->email;
        // $categoria->direccion = $request->direccion;
        // $categoria->telefono = $request->telefono;
        // //guardamos y regresamos al inicio
        // $categoria->save();
        // return redirect()->route('proveedores.index')->with('mensaje', 'Proveedor creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index');
        // $request->validate([
        //     'nombre'=>'required|string|max:255',
        //     'apellidos'=>'required|string|max:255',
        //     'email'=>'required|email|string|max:200|unique:proveedors',
        //     'direccion'=>'nullable|string|max:255',
        //     'telefono'=>'required|string|max:9|min:9',
        // ]);

        // $proveedor->update([
        //     'nombre' => strtoupper($request->nombre),
        //     'apellidos' => strtoupper($request->apellidos),
        //     'email' => $request->email,
        //     'direccion' => $request->direccion,
        //     'telefono' => $request->telefono
        // ]);
        // return redirect()->route('proveedores.index')->with('mensaje', 'Proveedor modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('mensaje', 'Proveedor borrado correctamente');
    }
}
