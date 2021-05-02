<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Modificar Proveedor'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <form name="create" method="POST" action="{{ route('proveedors.update', $proveedor) }}">
            @csrf
            @method("PUT")
            @bind($proveedor)
            <x-form-input name="nombre" label="Nombre"/>
            <x-form-input name="apellidos" label="Apellidos"/>
            <x-form-input name="email" label="Email"/>
            <x-form-input name="direccion" label="Dirección"/>
            <x-form-input name="telefono" label="Teléfono"/>

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-edit"></i> Modificar proveedor</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
