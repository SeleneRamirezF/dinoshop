<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'USUARIOS' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-5/6 ">
        <x-mensajes-alertas />
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
                                Email
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($usuarios as $item)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->name }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                        {{ $item->email }}
                                    </p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('usuarios.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="text-purple-800 hover:underline px-1"
                                            onclick="return confirm('¿Seguro que desea Borrar el usuario: {{ $item->name }} ?')">
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
    </div>

</x-app-layout>
