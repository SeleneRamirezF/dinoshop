{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Gestion de Libros' }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-2 w-4/5 mb-4">

        {{-- Llamamos a la vista de los mensajes de alertas
        <x-mensajes-alertas />

        <div class="py-3 text-right">
            <form action="{{ route('libros.index') }}" name="search">
                <i class="fas fa-search"></i>
                <span class="font-bold mx-2"> Tema: </span>
                <select name="tema" class="form-select mx-2" onchange="this.form.submit()">
                    <option value="%">Todos</option>
                    @foreach ($temas as $item)
                        @if ($request->tema == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                    @endforeach
                </select>

                <span class="font-bold mx-2"> Stock: </span>
                <select name="stock" class="form-select mx-2" onchange="this.form.submit()">
                    <option value="%">Cualquiera</option>

                    @if ($request->stock==1)
                        <option value="1" selected>De 0 a 10</option>
                    @else
                        <option value="1">De 0 a 10</option>
                    @endif

                    @if ($request->stock==2)
                        <option value="2" selected>De 10 a 50</option>
                    @else
                        <option value="2">De 10 a 50</option>
                    @endif

                    @if ($request->stock==3)
                        <option value="3" selected>Mas de 50</option>
                    @else
                        <option value="3">Mas de 50</option>
                    @endif

                </select>
            </form>
        </div>


        <a href="{{ route('libros.create') }}"
            class="my-8 bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
            <i class="fa fa-plus"></i> Nuevo libro</a>
        <div class="text-center">
        <table border="3">
            <thead class="font-bold bg-gray-100">
                <tr>
                    <th class="p-2">Detalles</th>
                    <th class="p-2">Titulo</th>
                    <th class="p-2">Tema</th>
                    <th class="p-2">Stock</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $item)
                    <tr class="my-2 p-8">
                        <td class="p-2">
                            <a href="{{ route('libros.show', $item) }}"
                                class="my-8 bg-indigo-600 hover:bg-indigo-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
                                <i class="fa fa-info-circle"></i> Detalles</a>
                        </td>
                        <td class="p-2">{{ $item->titulo }}</td>
                        <td class="p-2">{{ $item->tema->nombre }}</td>
                        <td class="p-2">{{ $item->stock }}</td>
                        <td class="p-2">
                            <form name="a" action="{{ route('libros.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('libros.edit', $item) }}"
                                    class="my-8 bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-4 shadow text-xs mt-5">
                                    <i class="fa fa-edit"></i> Editar</a>

                                <button type="submit"
                                    class="my-8 bg-red-600 hover:bg-red-800 rounded text-white font-bold py-2 px-4 shadow text-xs">
                                    <i class="fa fa-trash"></i> Borrar
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="mt-2">
            {{ $libros->appends($request->except('page'))->links() }}
        </div>

    </div>


</x-app-layout> --}}

