<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Modificar Cliente'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <form name="create" method="POST" action="{{ route('clientes.update', $cliente) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            @bind($cliente)
            <x-form-input name="nombre" label="Nombre"/>
            <x-form-input name="dni" label="Dni" placeholder="00000000X"/>
            <x-form-input name="direccion" label="Dirección"/>
            <x-form-input name="telefono" label="Teléfono"/>
            <x-form-input name="email" label="Email" placeholder="ejemplo@correo.com"/>
            <div>
              <label class="block mt-4 text-md font-medium text-gray-700">
                Imagen del cliente
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <div class="flex text-sm text-gray-600">
                    <img class="w-32 h-32 rounded-full mx-auto" src="{{asset($cliente->imagen)}}" alt="{{$cliente->nombre}}">
                    <input name="imagen" type="file"/>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-edit"></i> Modificar cliente</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
