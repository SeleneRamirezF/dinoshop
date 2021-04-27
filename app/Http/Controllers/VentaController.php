<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::orderBy('nombre');
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::get();
        return view('ventas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $venta = Venta::create($request->all());
        //recorremos el array del pedido y creamos los detalle del pedido
        foreach($request->producto_id as $key => $producto){
            $resultado[] = array(
                "producto_id"=>$request->producto_id[$key],
                "cantidad"=>$request->cantidad[$key],
                "precio"=>$request->precop[$key]
            );
        }
        $venta->detallesVenta()->createMany($resultado);
        return redirect()->route('ventas.index');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::get();
        return view('ventas.edit', compact('ventas'));
    }

    public function update(Request $request, Venta $venta)
    {
        //
    }

    public function destroy(Venta $venta)
    {
        //
    }
}
