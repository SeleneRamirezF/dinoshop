<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detalles del producto' }}
        </h2>
    </x-slot>

    <div class="flex items-center w-full justify-center">
        <x-mensajes-alertas />
        <div class="max-w-xs mt-1">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <img class="w-62 h-62 rounded-full mx-auto" src="{{ asset($producto->imagen) }}"
                        alt="{{ $producto->nombre }}">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{ $producto->nombre }}</h3>
                    <div class="text-justific text-gray-400 text-xs font-semibold">
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">PVP</td>
                                <td class="px-2 py-2">{{ $producto->pvp }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">STOCK</td>
                                <td class="px-2 py-2">{{ $producto->stock }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Categoría</td>
                                <td class="px-2 py-2">{{ $producto->categoria_id }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Proveedor</td>
                                <td class="px-2 py-2">{{ $producto->proveedor_id }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Producto Creado</td>
                                <td class="px-2 py-2">{{ $producto->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Producto Actualizado</td>
                                <td class="px-2 py-2">{{ $producto->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
