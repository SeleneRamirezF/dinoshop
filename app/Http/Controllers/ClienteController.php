<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware(
            ['auth','verified'],
            ['only'=>['edit', 'update', 'create', 'destroy', 'store' ]]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $datos = $request->validated();
        $cliente = new Cliente();
        $cliente->nombre=$datos['nombre'];
        $cliente->dni=$datos['dni'];
        $cliente->direccion=$datos['direccion'];
        $cliente->telefono=$datos['telefono'];
        $cliente->email=$datos['email'];

        if($request->has('imagen')){
            $request->validate(['imagen'=>['image']]);
            $ficheroSubido=$request->file('imagen');
            $nombre = "img/clientes/".uniqid()."_".$ficheroSubido->getClientOriginalName();
            Storage::Disk("public")->put($nombre, File::get($ficheroSubido));
            $cliente->imagen="storage/".$nombre;
        }

        try {
            $cliente->save();
            return redirect()->route('clientes.index');
        } catch (\Exception $ex) {
            return redirect()->route('clientes.index')->with('error', 'No se puede crear el cliente: ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Cliente $cliente)
    {
        $datos = $request->validated();
        $cliente->nombre=$datos['nombre'];
        $cliente->dni=$datos['dni'];
        $cliente->direccion=$datos['direccion'];
        $cliente->telefono=$datos['telefono'];
        $cliente->email=$datos['email'];

        if(isset($datos['nombre_imagen'])){
            if(basename($cliente->imagen)!='default.png') unlink($cliente->imagen);
            $cliente->imagen=$datos['nombre_imagen'];
        }
        try {
            $cliente->update();
            return redirect()->route('clientes.index');
        } catch (\Exception $ex) {
            return redirect()->route('clientes.index')->with('error', 'No se puede actualizar el cliente: ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        try{
            $cliente->delete();
            return redirect()->route('clientes.index')->with('mensaje', 'Cliente borrado correctamente');
        }catch (\Exception $ex) {
            return redirect()->route('clientes.index')->with('error', 'No se ha podido borrar el cliente: '. $ex->getMessage());
        }
    }
}
