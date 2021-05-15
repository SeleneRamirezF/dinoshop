<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Requests\Pedido\UpdateRequest;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    public function __construct(){
        $this->middleware(
            ['auth','verified'],
            ['only'=>['edit', 'update', 'create', 'destroy', 'store' ]]
        );
    }
    public function index()
    {
        //$pedidos = Pedido::get();
        $pedidos = Pedido::orderBy('id')->paginate(5);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        //$usuarios = User::orderBy('name')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        //$pedidos = Pedido::get();
        return view('pedidos.create', compact('proveedors', 'productos'));
    }

    public function store(StoreRequest $request)
    {
        $pedido = Pedido::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'fecha'=>Carbon::now()
            ]);
        //recorremos el array del pedido y creamos los detalle del pedido
       // dd($request->producto_id);
       //dd($request->product_id);
        foreach($request->product_id as $key => $producto){
            $resultado[] = array(
                "producto_id"=>$request->product_id[$key],
                "cantidad"=>$request->cantidad1[$key],
                "precio"=>$request->precio[$key]
            );
        }
        $pedido->detallePedido()->createMany($resultado);
        return redirect()->route('pedidos.index');
    }

    public function show(Pedido $pedido)
    {
        // $subtotal = 0 ;
        $detallesPedido = $pedido->detallesPedido;
        // foreach ($detallesPedido as $detallePedido) {
        //     $subtotal += $detallePedido->cantidad * $detallePedido->precio;
        // }
        return view('pedidos.show', compact('pedido', 'detallesPedido'));
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(UpdateRequest $request, Pedido $pedido)
    {
        app(DetallePedidoController::class)->cambiarEstado($pedido);
        $pedido->update($request->all());
        return redirect()->route('pedidos.index');
    }

    public function destroy(Pedido $pedido)
    {
        //$detallesPedido = $pedido->detallesPedido;
        $pedido->delete();
        //me traigo todos los registros de datallesPedido
        //y busco el que coincide con este pedido
        // $todosDetallesP = DetallePedido::get();
        // foreach ($todosDetallesP as $dP) {
        //     if( $dP->pedido_id == $pedido->id){
        //         app(DetallePedidoController::class)->destroy($dP);
        //     }
        // }
        return redirect()->route('pedidos.index')->with('mensaje', 'Pedido borrado correctamente');
    }
    public function cambiarEstado(Pedido $pedido)
    {
        if ($pedido->status == 'VALIDO') {
            $pedido->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $pedido->update(['estado'=>'VALIDO']);
            return redirect()->back();
        }
    }
}
