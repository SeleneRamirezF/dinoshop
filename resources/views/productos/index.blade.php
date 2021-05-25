<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PRODUCTOS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-5/6">
        <x-mensajes-alertas />
        <a href="{{route('productos.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nuevo Producto</a>
{{-- prueba tabla--}}

<div class="min-h-full mt-3 flex items-center px-2">
    <div class='overflow-x-auto w-full'>

        <!-- Table -->
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Detalle
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Nombre
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        PVP(€)
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Stock
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Categoría
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Proveedor
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Imagen
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($productos as $item)
                <tr>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center space-x-3">
                            <a href="{{route('productos.show', $item)}}" class="text-purple-800 hover:underline">
                                <i class="fa fa-info"></i>
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->nombre}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->pvp}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->stock}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->categoria->nombre}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->proveedor->nombre}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex w-10 h-10">
                            <img src="{{asset($item->imagen)}}" class="class='w-15 h-15 object-cover rounded-full'">
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{route('productos.destroy', $item)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="{{route('productos.edit', $item)}}" class="text-purple-800 hover:underline">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="text-purple-800 hover:underline"
                                onclick="return confirm('¿Seguro que desea Borrar el producto: {{ $item->nombre }} ?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


{{-- fin prueba tabla--}}
        {{-- <div class="text-center grid grid-cols-8 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
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
                <img src="{{asset($item->imagen)}}" width="95rem" height="90rem" class="rounded-circle">
            </div>
            <div>
                <form action="{{route('productos.destroy', $item)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <a href="{{route('productos.edit', $item)}}"
                        class="my-3 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button type="submit"
                        class="my-3 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar el producto: {{ $item->nombre }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div> --}}
        <div class="mt-4">
            {{$productos->links()}}
        </div>
    </div>

</x-app-layout>
