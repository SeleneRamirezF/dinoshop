<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'CATEGORIAS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <a href="{{route('categorias.create')}}"
            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
            <i class="fa fa-plus"></i></a>


<div class="min-h-full mt-3 flex items-center px-2">
    <div class='overflow-x-auto w-full'>

        <!-- Table -->
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Nombre
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Descripción
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categorias as $item)
                <tr>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->nombre}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                            {{$item->descripcion}}
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{route('categorias.destroy', $item)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="{{route('categorias.edit', $item)}}" class="text-purple-800 hover:underline">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="text-purple-800 hover:underline"
                                onclick="return confirm('¿Seguro que desea Borrar la Categoría: {{ $item->nombre }} ?')">
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

        {{-- <div class="text-center grid grid-cols-3 py-2 gap-2 mt-10 border-2 border-blue-200 shadow text-xm">
            <div class="font-bold text-gray-700">Nombre</div>
            <div class="font-bold text-gray-700">Descripción</div>
            <div class="font-bold text-gray-700">Acciones</div>
        </div>
        <div class="text-center grid grid-cols-3 py-2 gap-2 mt-10 border-2 border-blue-200 shadow py-5 text-xs">
            @foreach($categorias as $item)
            <div>
                {{$item->nombre}}
            </div>
            <div>
                {{$item->descripcion}}
            </div>
            <div>
                <form action="{{route('categorias.destroy', $item)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <a href="{{route('categorias.edit', $item)}}"
                        class="mx-3 bg-red-400 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <button type="submit"
                        class="mx-3 bg-yellow-700 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow"
                        onclick="return confirm('¿Seguro que desea Borrar la Categoría: {{ $item->nombre }} ?')">
                        <i class="fas fa-trash"></i> Borrar
                    </button>
                </form>
            </div>
            @endforeach
        </div> --}}
        <div class="mt-4">
            {{$categorias->links()}}
        </div>
    </div>

</x-app-layout>
