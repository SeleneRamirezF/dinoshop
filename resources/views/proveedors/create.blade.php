<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear Proveedor' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <form name="create" method="POST" action="{{ route('proveedors.store') }}">
            @csrf
            <x-form-input name="nombre" label="Nombre" />
            <x-form-input name="apellidos" label="Apellidos" />
            <x-form-input name="email" label="Email" placeholder="ejemplo@correo.com" />
            <x-form-input name="direccion" label="Dirección" />
            <x-form-input name="telefono" label="Teléfono" />

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
