<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Requests\Pedido\UpdateRequest;
use App\Models\Proveedor;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::orderBy('nombre');
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $pedidos = Pedido::get();
        return view('pedidos.create', compact('pedidos'));
    }

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

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $proveedors = Proveedor::get();
        return view('pedidos.edit', compact('proveedors'));
    }

    public function update(UpdateRequest $request, Pedido $pedido)
    {
        //
    }

    public function destroy(Pedido $pedido)
    {
        //
    }
}
