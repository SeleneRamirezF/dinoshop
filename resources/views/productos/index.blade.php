<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PRODUCTOS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

    @if ($texto = Session::get('mensaje'))
    <p class="bg-blue-400 text-white p-2 my-3 font-bold">{{ $texto }}</p>
    @endif

    <a href="{{route('productos.create')}}"
        class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fa fa-plus"></i> Nuevo Producto</a>

    <div class="text-center grid grid-cols-8 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
        <div class="font-bold text-gray-700">Detalle</div>
        <div class="font-bold text-gray-700">Nombre</div>
        <div class="font-bold text-gray-700">PVP(€)</div>
        <div class="font-bold text-gray-700">Stock</div>
        <div class="font-bold text-gray-700">Categoría</div>
        <div class="font-bold text-gray-700">Proveedor</div>
        <div class="font-bold text-gray-700">Imagen</div>
        <div class="font-bold text-gray-700">Acciones</div>
    </div>
    <div class="text-center grid grid-cols-8 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
        @foreach($productos as $item)
        <div class="mb-5">
            <a href="{{route('productos.show', $item)}}"
                class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
                <i class="fa fa-info"></i> Detalle</a>
        </div>
        <div>
            {{$item->nombre}}
        </div>
        <div>
            {{$item->pvp}}
        </div>
        <div>
            {{$item->stock}}
        </div>
        <div>
            {{$item->categoria->nombre}}
        </div>
        <div>
            {{$item->proveedor->nombre}}
        </div>
        <div>
            {{$item->imagen}}
        </div>
        <div>
            <form action="{{route('productos.destroy', $item)}}" method="POST">
                @csrf
                @method("DELETE")
                <a href="{{route('productos.edit', $item)}}"
                    class="m-1 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fa fa-edit"></i> Editar
                </a>
                <button type="submit"
                    class="m-1 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                    onclick="return confirm('¿Seguro que desea Borrar el producto: {{ $item->nombre }} ?')">
                    <i class="fas fa-trash"></i> Borrar
                </button>
            </form>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{$productos->links()}}
    </div>
</div>

</x-app-layout>
