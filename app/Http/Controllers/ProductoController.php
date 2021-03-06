<?php

namespace App\Http\Controllers;

use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            ['auth', 'verified'],
            ['only' => ['edit', 'update', 'create', 'destroy', 'store']]
        );
    }
    public function index(Request $request)
    {
        $productos = Producto::orderBy('nombre')
            ->nombre($request->get('nombre'))
            ->categoria($request->get('categoria'))
            ->pvp($request->get('pvp'))
            ->paginate(4)
            ->withQueryString();
        $selectOption = $request->nombre;
        $selectOptionC = $request->categoria;
        $selectOptionPVP = $request->pvp;

        return view('productos.index', compact('productos', 'selectOption', 'selectOptionC', 'selectOptionPVP'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        return view('productos.create', compact('categorias', 'proveedors'));
    }

    public function store(StoreRequest $request)
    {
        $datos = $request->validated();
        $producto = new Producto();
        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->pvp = $datos['pvp'];
        $producto->stock = $datos['stock'];
        $producto->categoria_id = $datos['categoria_id'];
        $producto->proveedor_id = $datos['proveedor_id'];

        if ($request->has('imagen')) {
            $request->validate(['imagen' => ['image']]);
            $ficheroSubido = $request->file('imagen');
            $nombre = "img/productos/" . uniqid() . "_" . $ficheroSubido->getClientOriginalName();
            Storage::Disk("public")->put($nombre, File::get($ficheroSubido));
            $producto->imagen = "storage/" . $nombre;
        }

        try {
            $producto->save();
            return redirect()->route('productos.index');
        } catch (\Exception $ex) {
            return redirect()->route('productos.index')->with('error', 'No se puede crear el producto: ' . $ex->getMessage());
        }
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        return view('productos.edit', compact('producto', 'categorias', 'proveedors'));
    }

    public function update(UpdateRequest $request, Producto $producto)
    {
        $datos = $request->validated();
        $producto->nombre = $datos['nombre'];
        $producto->descripcion = $datos['descripcion'];
        $producto->pvp = $datos['pvp'];
        $producto->stock = $datos['stock'];
        $producto->categoria_id = $datos['categoria_id'];
        $producto->proveedor_id = $datos['proveedor_id'];

        if (isset($datos['nombre_imagen'])) {
            if (basename($producto->imagen) != 'default.png') {
                unlink($producto->imagen);
            }

            $producto->imagen = $datos['nombre_imagen'];
        }

        try {
            $producto->update();
            return redirect()->route('productos.index');
        } catch (\Exception $ex) {
            return redirect()->route('productos.index')->with('error', 'No se puede actualizar el producto: ' . $ex->getMessage());
        }
    }

    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return redirect()->route('productos.index')->with('mensaje', 'Producto borrado correctamente');
        } catch (\Exception $ex) {
            return redirect()->route('productos.index')->with('error', 'No se han podido borrar el producto: ' . $ex->getMessage());
        }
    }
}
