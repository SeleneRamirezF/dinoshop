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
            <div>
                {{$item->id}}
            </div>
            <div>
                {{$item->proveedor->nombre}}
            </div>
            <div>
                {{$item->usuario->nombre}}
            </div>
            <div>
                {{$item->estado}}
            </div>
            <div>
                <form action="{{route('#', $item)}}" method="POST">
                    {{-- pedidos.destroy --}}
                    @csrf
                    @method("DELETE")
                    {{-- pedidos.edit --}}
                    <a href="{{route('#', $item)}}"
                        class="mx-3 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button type="submit"
                        class="mx-3 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar la pedido: {{ $item->id }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{$pedidos->links()}}
        </div>
    </div>

</x-app-layout>
