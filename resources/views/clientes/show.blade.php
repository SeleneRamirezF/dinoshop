<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Detalles del cliente'}}
        </h2>
    </x-slot>

    <div class="flex items-center w-full justify-center">
        <x-mensajes-alertas />
        <div class="max-w-xs mt-1">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <img class="w-62 h-62 rounded-full mx-auto" src="{{asset($cliente->imagen)}}" alt="{{$cliente->nombre}}">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$cliente->nombre}}</h3>
                    <div class="text-justific text-gray-400 text-xs font-semibold">
                        <p>{{$cliente->email}}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">DNI</td>
                                <td class="px-2 py-2">{{$cliente->dni}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Dirección</td>
                                <td class="px-2 py-2">{{$cliente->direccion}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">telefono</td>
                                <td class="px-2 py-2">{{$cliente->telefono}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Cliente Creado</td>
                                <td class="px-2 py-2">{{$cliente->created_at}}</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Cliente Actualizado</td>
                                <td class="px-2 py-2">{{$cliente->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
