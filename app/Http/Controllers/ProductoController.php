<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware(
            ['auth','verified'],
            ['only'=>['edit', 'update', 'create', 'destroy', 'store' ]]
        );
    }
    public function index()
    {
        $productos = Producto::orderBy('nombre')->paginate(3);
        return view('productos.index', compact('productos'));
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
        $producto->nombre=$datos['nombre'];
        $producto->descripcion=$datos['descripcion'];
        $producto->pvp=$datos['pvp'];
        $producto->stock=$datos['stock'];
        $producto->categoria_id=$datos['categoria_id'];
        $producto->proveedor_id=$datos['proveedor_id'];

        if(isset($datos['nombre_imagen'])){
            $producto->imagen=$datos['nombre_imagen'];
        }
        try {
            $producto->save();
            return redirect()->route('productos.index');
        } catch (\Exception $ex) {
            return redirect()->route('productos.index')->with('error', 'No se puede crear el producto: ' . $ex->getMessage());;
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

    public function update(StoreRequest $request, Producto $producto)
    {
        $datos = $request->validated();
        $producto->nombre=$datos['nombre'];
        $producto->descripcion=$datos['descripcion'];
        $producto->pvp=$datos['pvp'];
        $producto->stock=$datos['stock'];
        $producto->categoria_id=$datos['categoria_id'];
        $producto->proveedor_id=$datos['proveedor_id'];

        if(isset($datos['nombre_imagen'])){
            if(basename($producto->imagen)!='default.png') unlink($producto->imagen);
            $producto->imagen=$datos['nombre_imagen'];
        }

        try {
            $producto->update();
            return redirect()->route('productos.index');
        } catch (\Exception $ex) {
            return redirect()->route('productos.index')->with('error', 'No se puede actualizar el producto: ' . $ex->getMessage());;
        }
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('mensaje', 'Producto borrado correctamente');
    }
}
