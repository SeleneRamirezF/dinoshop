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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::orderBy('nombre')->paginate(3);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        return view('productos.create', compact('categorias', 'proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // if(is_uploaded_file($this->imagen)){
        //     //nombre unico
        //     $nombreI='img/productos'.uniqid()."_".$this->imagen->getClientOriginalName();
        //     //lo guardamos en la carpeta que queremos
        //     Storage::disk('public')->put($nombreI, File::get($this->imagen));
        //     //creamos un campo nuevo en el request con el nombre del fichero
        //     $this->merge(['nombre_imagen'=>"storage/$nombreI"]);
        // }
        //si existe el nombre de la foto lo guardo sino nulo
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $proveedors = Proveedor::orderBy('nombre')->get();
        return view('productos.edit', compact('producto', 'categorias', 'proveedors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
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
            $producto->imagen=$datos['nombre_foto'];
        }

        $producto->update();
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('mensaje', 'Producto borrado correctamente');
    }
}
