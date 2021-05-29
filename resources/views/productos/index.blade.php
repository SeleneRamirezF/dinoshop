<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'PRODUCTOS' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-5/6 ">
        <x-mensajes-alertas />
        <div>
            <a href="{{ route('productos.create') }}"
                class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
                <i class="fa fa-plus"></i></a>
        </div>
        <div class="text-right">
            <form name="search" action="{{route('productos.index')}}">
                <i class="fa fa-search"></i>
                <span class="font-bold text-gray-700 mx-2">Nombre:</span>
                <select name="nombre" class="form-select relative bg-white border border-gray-300 rounded-md
                shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500
                focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                    <option value="%">Todos</option>
                    <option value="1" @if($selectOption == '1') selected @endif>A-F</option>
                    <option value="2" @if($selectOption == '2') selected @endif>G-L</option>
                    <option value="3" @if($selectOption == '3') selected @endif>M-R</option>
                    <option value="4" @if($selectOption == '4') selected @endif>S-Z</option>
                </select>
                <span class="font-bold text-gray-700 mx-2">Categoría:</span>
                <select name="categoria" class="form-select relative bg-white border border-gray-300 rounded-md
                shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500
                focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                    <option value="0">Todos</option>
                    <option value="1" @if($selectOptionC == '1') selected @endif>Moda</option>
                    <option value="2" @if($selectOptionC == '2') selected @endif>Juegos de mesa</option>
                    <option value="3" @if($selectOptionC == '3') selected @endif>Jugetes</option>
                    <option value="4" @if($selectOptionC == '4') selected @endif>Muñecos</option>
                    <option value="5" @if($selectOptionC == '5') selected @endif>Biblioteca</option>
                    <option value="6" @if($selectOptionC == '6') selected @endif>Filmografia</option>
                    <option value="7" @if($selectOptionC == '7') selected @endif>Completmentos</option>
                    <option value="8" @if($selectOptionC == '8') selected @endif>Oficina</option>
                    <option value="9" @if($selectOptionC == '9') selected @endif>Electrónica</option>
                </select>
            </form>
        </div>

        {{-- prueba tabla --}}

        <div class="min-h-full mt-3 flex items-center px-2">
            <div class='overflow-x-auto w-full'>

                <!-- Table -->
                <table
                    class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-50">
                        <tr class="text-gray-600 text-left">
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
                        @foreach ($productos as $item)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->nombre }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->pvp }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->stock }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->categoria->nombre }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->proveedor->nombre }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex w-10 h-10">
                                        <img src="{{ asset($item->imagen) }}"
                                            class="class='w-15 h-15 object-cover rounded-full'">
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('productos.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <a href="{{ route('productos.show', $item) }}"
                                            class="text-purple-800 hover:underline px-1">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ route('productos.edit', $item) }}"
                                            class="text-purple-800 hover:underline px-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="text-purple-800 hover:underline px-1"
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


        {{-- fin prueba tabla --}}
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
            @foreach ($productos as $item)
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
            {{ $productos->links() }}
        </div>
    </div>

</x-app-layout>
