<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'VENTAS' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />

        @if (Auth::user()->id != 1)
            <p class=" text-4xl font-bold mt-3">GRACIAS POR TU COMPRA</p>
            <br/>
            <a href="{{ url('/dashboard') }}"
                class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow mt-3 mr-2">
                <i class="fas fa-cart-plus"> </i> Volver a inicio
            </a>
            <a href="{{ route('ventas.create') }}"
                class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow mt-3">
                <i class="fa fa-home"> </i> Hacer otra compra
            </a>
        @endif

        @if (Auth::user()->id == 1)
            <a href="{{ route('ventas.create') }}"
                class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
                <i class="fa fa-plus"></i>
            </a>

            <div class="min-h-full mt-3 flex items-center px-2">
                <div class='overflow-x-auto w-full'>
                    <!-- Table -->
                    <table
                        class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-50">
                            <tr class="text-gray-600 text-left">
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    ID
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
                            @foreach ($ventas as $item)
                                <tr>
                                    <td class="px-6 py-4 text-center">
                                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                            {{ $item->id }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                            {{ $item->user->name }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                            {{ $item->estado }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('ventas.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <a href="{{ route('ventas.show', $item) }}"
                                                class="text-purple-800 hover:underline px-1">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{ route('productos.edit', $item) }}"
                                                class="text-purple-800 hover:underline px-1">
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
            <div class="mt-4">
                {{ $ventas->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
