<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'PRODUCTOS' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-5/6 ">
        <x-mensajes-alertas />

        @if (Auth::user()->id == 1)
            <div>
                <a href="{{ route('productos.create') }}"
                    class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fa fa-plus"></i></a>
            </div>
        @endif

        <div class="text-right">
            <form name="search" action="{{ route('productos.index') }}">
                <i class="fa fa-search"></i>
                <select name="nombre" class="form-select relative bg-white border border-gray-300 rounded-md
                shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500
                focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                    <option disabled selected>Nombre:</option>
                    <option value="%">Todos</option>
                    <option value="1" @if ($selectOption == '1') selected @endif>A-F</option>
                    <option value="2" @if ($selectOption == '2') selected @endif>G-L</option>
                    <option value="3" @if ($selectOption == '3') selected @endif>M-R</option>
                    <option value="4" @if ($selectOption == '4') selected @endif>S-Z</option>
                </select>
                <select name="categoria" class="form-select relative bg-white border border-gray-300 rounded-md
                shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500
                focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                    <option disabled selected>Categoría:</option>
                    <option value="0">Todos</option>
                    <option value="1" @if ($selectOptionC == '1') selected @endif>Moda</option>
                    <option value="2" @if ($selectOptionC == '2') selected @endif>Juegos de mesa</option>
                    <option value="3" @if ($selectOptionC == '3') selected @endif>Jugetes</option>
                    <option value="4" @if ($selectOptionC == '4') selected @endif>Muñecos</option>
                    <option value="5" @if ($selectOptionC == '5') selected @endif>Biblioteca</option>
                    <option value="6" @if ($selectOptionC == '6') selected @endif>Filmografia</option>
                    <option value="7" @if ($selectOptionC == '7') selected @endif>Completmentos</option>
                    <option value="8" @if ($selectOptionC == '8') selected @endif>Oficina</option>
                    <option value="9" @if ($selectOptionC == '9') selected @endif>Electrónica</option>
                </select>
                <select name="pvp" class="form-select relative bg-white border border-gray-300 rounded-md
                shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500
                focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                    <option disabled selected>Precio:</option>
                    <option value="0">Todos</option>
                    <option value="1" @if ($selectOptionPVP == '1') selected @endif>0 - 50</option>
                    <option value="2" @if ($selectOptionPVP == '2') selected @endif>50 - 100</option>
                    <option value="3" @if ($selectOptionPVP == '3') selected @endif>100 - 200</option>
                    <option value="4" @if ($selectOptionPVP == '4') selected @endif>200 - 400</option>
                    <option value="5" @if ($selectOptionPVP == '5') selected @endif>400 - 600</option>
                    <option value="6" @if ($selectOptionPVP == '6') selected @endif>600 - 800</option>
                    <option value="7" @if ($selectOptionPVP == '7') selected @endif>más de 800</option>
                </select>
            </form>
        </div>

        <div class="min-h-full mt-3 flex items-center px-2">
            <div class='overflow-x-auto w-full'>

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
                                        @if (Auth::user()->id == 1)
                                            <a href="{{ route('productos.edit', $item) }}"
                                                class="text-purple-800 hover:underline px-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" class="text-purple-800 hover:underline px-1"
                                                onclick="return confirm('¿Seguro que desea Borrar el producto: {{ $item->nombre }} ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $productos->links() }}
        </div>
    </div>

</x-app-layout>
