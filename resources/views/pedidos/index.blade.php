<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PEDIDOS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <a href="{{route('pedidos.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nueva Pedido</a>

        <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
            <div class="font-bold text-gray-700">Detalle</div>
            <div class="font-bold text-gray-700">ID</div>
            <div class="font-bold text-gray-700">Proveedor</div>
            <div class="font-bold text-gray-700">Usuario</div>
            <div class="font-bold text-gray-700">Estado</div>
            <div class="font-bold text-gray-700">Acciones</div>
        </div>
        <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
            @foreach($pedidos as $item)
            <div class="mb-5">
                <a href="{{route('pedidos.show', $item)}}"
                    class="bg-purple-400 hover:bg-green-200 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fa fa-info"></i> Detalle</a>
            </div>
            <div>
                {{$item->id}}
            </div>
            <div>
                {{$item->proveedor_id}}
            </div>
            <div>
                {{$item->user->name}}
            </div>
            <div>
                {{$item->estado}}
            </div>
            <div>
                {{-- proveedor_id', 'user_id', 'fecha', 'total', 'estado']; --}}
                <form action="{{route('pedidos.destroy', $item)}}" method="POST">

                    @csrf
                    @method("DELETE")

                    <a href="{{route('pedidos.edit', $item)}}"
                        class="my-1 mx-1 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button type="submit"
                        class="my-1 mx-1 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar la pedido: {{ $item->id }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{-- {{$pedidos->links()}} --}}
        </div>
    </div>

</x-app-layout>
