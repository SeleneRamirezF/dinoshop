<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Detalles del pedido'}}
        </h2>
    </x-slot>
    <div class="flex items-center w-full justify-center">
        <x-mensajes-alertas />
        <div class="max-w-xs mt-1">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$pedido->estado}}</h3>
                    <div class="text-center text-gray-800 text-xs font-semibold">
                        <p>{{$pedido->id}}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Usuario</td>
                                <td class="px-2 py-2">{{$pedido->user->name}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Proveedor</td>
                                <td class="px-2 py-2">{{$pedido->proveedor_id}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Total</td>
                                <td class="px-2 py-2">{{$pedido->total}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Pedido Creado</td>
                                <td class="px-2 py-2">{{$pedido->created_at}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Pedido Actualizado</td>
                                <td class="px-2 py-2">{{$pedido->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
