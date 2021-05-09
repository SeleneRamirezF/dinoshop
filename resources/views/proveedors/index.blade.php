<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PROVEEDORES'}}
        </h2>
    </x-slot>
    <div class="container mt-3 mx-auto p-2 w-5/6">
        <x-mensajes-alertas />
        <a href="{{route('proveedors.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i> Nuevo Proveedor</a>

        <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
            <div class="font-bold text-gray-700">Nombre</div>
            <div class="font-bold text-gray-700">Apellidos</div>
            <div class="font-bold text-gray-700">Email</div>
            <div class="font-bold text-gray-700">Direccion</div>
            <div class="font-bold text-gray-700">Teléfono</div>
            <div class="font-bold text-gray-700">Acciones</div>
        </div>
        <div class="text-center grid grid-cols-6 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
            @foreach($proveedors as $item)
            <div>
                {{$item->nombre}}
            </div>
            <div>
                {{$item->apellidos}}
            </div>
            <div>
                {{$item->email}}
            </div>
            <div>
                {{$item->direccion}}
            </div>
            <div>
                {{$item->telefono}}
            </div>
            <div>
                <form action="{{route('proveedors.destroy', $item)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <a href="{{route('proveedors.edit', $item)}}"
                        class="my-3 mx-1 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button type="submit"
                        class="my-3 mx-1 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar el proveedor: {{ $item->nombre }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{$proveedors->links()}}
        </div>
    </div>

</x-app-layout>
