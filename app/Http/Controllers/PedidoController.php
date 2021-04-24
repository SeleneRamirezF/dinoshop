<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Requests\Pedido\UpdateRequest;
use App\Models\Proveedor;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::orderBy('nombre');
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = Pedido::get();
        return view('pedidos.create', compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $pedido = Pedido::create($request->all());
        //recorremos el array del pedido y creamos los detalle del pedido
        foreach($request->producto_id as $key => $producto){
            $resultado[] = array(
                "producto_id"=>$request->producto_id[$key],
                "cantidad"=>$request->cantidad[$key],
                "precio"=>$request->precop[$key]
            );
        }
        $pedido->detallePedido()->createMany($resultado);
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $proveedors = Proveedor::get();
        return view('pedidos.edit', compact('proveedors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Pedido $pedido)
    {
        // $pedido->update($request->all());
        // return redirect()->route('pedidos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        // $pedido->delete();
        // return redirect()->route('pedidos.index')->with('mensaje', 'Pedido borrado correctamente');
    }
}
