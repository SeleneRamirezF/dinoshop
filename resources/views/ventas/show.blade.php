<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detalles de la venta' }}
        </h2>
    </x-slot>

    <div class="flex items-center w-full justify-center">
        <x-mensajes-alertas />
        <div class="max-w-xs mt-1">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">ESTADO {{ $venta->estado }}</h3>
                    <div class="text-center text-gray-800 text-xs font-semibold">
                        <p>Total: {{ $venta->total }}</p>
                    </div>
                    <table class="text-xs my-3">
                        <thead>
                            <tr>
                                <th class="px-2 py-2 text-gray-500 font-semibold">ID Venta</th>
                                <th class="px-2 py-2 text-gray-500 font-semibold">Producto</th>
                                <th class="px-2 py-2 text-gray-500 font-semibold">Cantidad</th>
                                <th class="px-2 py-2 text-gray-500 font-semibold">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detallesVenta as $item)
                                @if ($item->venta_id == $venta->id)
                                    <tr>
                                        <td class="px-2 py-2">{{ $item->venta_id }}</td>
                                        <td class="px-2 py-2">{{ $item->producto->nombre }}</td>
                                        <td class="px-2 py-2">{{ $item->cantidad }}</td>
                                        <td class="px-2 py-2">{{ $item->precio }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
