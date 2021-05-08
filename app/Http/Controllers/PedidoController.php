<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Requests\Pedido\UpdateRequest;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;

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
        $pedidos = Pedido::orderBy('nombre')->paginate(5);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $usuarios = User::orderBy('name')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        //$pedidos = Pedido::get();
        return view('pedidos.create', compact('usuarios', 'proveedors', 'productos'));
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
