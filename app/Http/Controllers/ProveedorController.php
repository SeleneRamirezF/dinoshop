<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            ['auth', 'verified'],
            ['only' => ['edit', 'update', 'create', 'destroy', 'store']]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = Proveedor::orderBy('nombre')->paginate(4);
        return view('proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            Proveedor::create($request->all());
            return redirect()->route('proveedors.index');
        } catch (\Exception $ex) {
            return redirect()->route('proveedors.index')->with('error', 'No se han podido crear el proveedor: ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedors.edit', compact('proveedor'));
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
        try {
            $proveedor->update($request->all());
            return redirect()->route('proveedors.index');
        } catch (\Exception $ex) {
            return redirect()->route('proveedors.index')->with('error', 'No se han podido actualizar el proveedor: ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        try {
            $proveedor->delete();
            return redirect()->route('proveedors.index')->with('mensaje', 'Proveedor borrado correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('proveedors.index')->with('error', 'No se han podido borrar el proveedor: ' . $ex->getMessage());
        }
    }
}
