<?php

namespace App\Http\Controllers;

use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
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
        $ventas = Venta::orderBy('id')->paginate(5);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('ventas.create', compact('productos'));
    }

    public function store(StoreRequest $request)
    {
        try {
            $venta = Venta::create($request->all() + [
                'user_id' => Auth::user()->id,
                'fecha' => Carbon::now(),
            ]);
            //recorremos el array de la venta y creamos los detalle de la venta
            foreach ($request->product_id as $key => $producto) {
                $resultado[] = array(
                    "producto_id" => $request->product_id[$key],
                    "cantidad" => $request->cantidad1[$key],
                    "precio" => $request->precio[$key],
                );
            }
            $venta->detallesVenta()->createMany($resultado);
            return redirect()->route('ventas.index');

        } catch (\Exception $ex) {
            return redirect()->route('ventas.index')->with('error', 'No se han podido crear la venta: ' . $ex->getMessage());
        }
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
        try {
            $venta->update($request->all());
            return redirect()->route('ventas.index');
        } catch (\Exception $ex) {
            return redirect()->route('ventas.index')->with('error', 'No se han podido actualizar la venta: ' . $ex->getMessage());
        }
    }

    public function destroy(Venta $venta)
    {
        try {
            $venta->delete();
            return redirect()->route('ventas.index')->with('mensaje', 'Venta borrada correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('ventas.index')->with('error', 'No se han podido borrar la venta: ' . $ex->getMessage());
        }
    }

    public function cambiarEstado(Venta $venta)
    {
        if ($venta->status == 'VALIDO') {
            $venta->update(['estado' => 'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['estado' => 'VALIDO']);
            return redirect()->back();
        }
    }
}
