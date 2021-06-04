<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Requests\Pedido\UpdateRequest;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            ['auth', 'verified'],
            ['only' => ['edit', 'update', 'create', 'destroy', 'store']]
        );
    }
    public function index()
    {
        $pedidos = Pedido::orderBy('id')->paginate(5);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $proveedors = Proveedor::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();
        return view('pedidos.create', compact('proveedors', 'productos'));
    }

    public function store(StoreRequest $request)
    {
        try {
            $pedido = Pedido::create($request->all() + [
                'user_id' => Auth::user()->id,
                'fecha' => Carbon::now(),
            ]);

            foreach ($request->product_id as $key => $producto) {
                $resultado[] = array(
                    "producto_id" => $request->product_id[$key],
                    "cantidad" => $request->cantidad1[$key],
                    "precio" => $request->precio[$key],
                );
            }
            $pedido->detallePedido()->createMany($resultado);
            return redirect()->route('pedidos.index');

        } catch (\Exception $ex) {
            return redirect()->route('pedidos.index')->with('error', 'No se han podido crear el pedido: ' . $ex->getMessage());
        }
    }

    public function show(Pedido $pedido)
    {
        $detallesPedido = DetallePedido::orderBy('id')->get();
        return view('pedidos.show', compact('pedido', 'detallesPedido'));
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(UpdateRequest $request, Pedido $pedido)
    {
        app(DetallePedidoController::class)->cambiarEstado($pedido);
        try {
            $pedido->update($request->all());
            return redirect()->route('pedidos.index');

        } catch (\Exception $ex) {
            return redirect()->route('pedidos.index')->with('error', 'No se han actualizar el pedido: ' . $ex->getMessage());
        }
    }

    public function destroy(Pedido $pedido)
    {
        try {
            $pedido->delete();
            return redirect()->route('pedidos.index')->with('mensaje', 'Pedido borrado correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('pedidos.index')->with('error', 'No se han podido borrar el pedido: ' . $ex->getMessage());
        }
    }
    public function cambiarEstado(Pedido $pedido)
    {
        if ($pedido->status == 'VALIDO') {
            $pedido->update(['estado' => 'CANCELADO']);
            return redirect()->back();
        } else {
            $pedido->update(['estado' => 'VALIDO']);
            return redirect()->back();
        }
    }
}
