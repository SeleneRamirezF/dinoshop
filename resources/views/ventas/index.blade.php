<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PEDIDOS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />


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
                        ID
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Cliente
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Usuario
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Estado
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($ventas as $item)
                <tr>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center space-x-3">
                            <a href="{{route('ventas.show', $item)}}" class="text-purple-800 hover:underline">
                                <i class="fa fa-info"></i>
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->id}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->cliente_id}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->user->name}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->estado}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{route('ventas.destroy', $item)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="{{route('productos.edit', $item)}}" class="text-purple-800 hover:underline">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="text-purple-800 hover:underline"
                                onclick="return confirm('¿Seguro que desea Borrar la pedido: {{ $item->id }} ?')">
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

        {{-- <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
            <div class="font-bold text-gray-700">Detalle</div>
            <div class="font-bold text-gray-700">ID</div>
            <div class="font-bold text-gray-700">Cliente</div>
            <div class="font-bold text-gray-700">Usuario</div>
            <div class="font-bold text-gray-700">Estado</div>
            <div class="font-bold text-gray-700">Acciones</div>
        </div>
        <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
            @foreach($ventas as $item)
            <div class="mb-5">
                <a href="{{route('ventas.show', $item)}}"
                    class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fa fa-info"></i> Detalle</a>
            </div>
            <div>
                {{$item->id}}
            </div>
            <div>
                {{$item->cliente_id}}
            </div>
            <div>
                {{$item->user->name}}
            </div>
            <div>
                {{$item->estado}}
            </div>
            <div>
                <form action="{{route('ventas.destroy', $item)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit"
                        class="my-1 mx-1 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar la pedido: {{ $item->id }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div> --}}
        <div class="mt-4">
            {{$ventas->links()}}
        </div>
    </div>

</x-app-layout>
