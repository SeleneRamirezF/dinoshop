<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class VentaController extends Controller
{
    public function __construct(){
        $this->middleware(
            ['auth','verified'],
            ['only'=>['edit', 'update', 'create', 'destroy', 'store' ]]
        );
    }

    public function index()
    {
        $ventas = Venta::orderBy('id')->paginate(5);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        // $clientes = Cliente::orderBy('id')->get();
        $productos = Producto::orderBy('nombre')->get();
        return view('ventas.create', compact('productos'));//'clientes',
    }

    public function store(StoreRequest $request)
    {
        $venta = Venta::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'fecha'=>Carbon::now()
            ]);
        //recorremos el array de la venta y creamos los detalle de la venta
        foreach($request->product_id as $key => $producto){
            $resultado[] = array(
                "producto_id"=>$request->product_id[$key],
                "cantidad"=>$request->cantidad1[$key],
                "precio"=>$request->precio[$key]
            );
        }
        $venta->detallesVenta()->createMany($resultado);
        return redirect()->route('ventas.index');
    }

    public function show(Venta $venta)
    {
        $detallesVenta = DetalleVenta::orderBy('id')->get();
        return view('ventas.show', compact('venta', 'detallesVenta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('ventas'));
    }

    public function update(UpdateRequest $request, Venta $venta)
    {
        app(DetalleVentaController::class)->cambiarEstado($venta);
        $venta->update($request->all());
        return redirect()->route('ventas.index');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('mensaje', 'Venta borrada correctamente');
    }

    public function cambiarEstado(Venta $venta)
    {
        if ($venta->status == 'VALIDO') {
            $venta->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['estado'=>'VALIDO']);
            return redirect()->back();
        }
    }
}
