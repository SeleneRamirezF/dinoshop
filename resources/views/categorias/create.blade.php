<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Crear Categoría'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

        <x-mensajes-alertas />

        <form name="create" method="POST" action="{{ route('categorias.store') }}">
            @csrf
            <x-form-input name="nombre" label="Nombre categoría" placeholder="Nombre"/>
            <x-form-textarea name="descripcion" label="Descripción categoría" placeholder="Descripción"/>

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
