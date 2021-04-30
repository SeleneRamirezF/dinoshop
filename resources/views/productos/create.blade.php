<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'PRODUCTOS'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <form name="create" method="POST" action="{{route('productos.store')}}">
            @csrf
            <x-form-input name="nombre" label="Nombre producto" placeholder="Nombre"/>
            <x-form-textarea name="descripcion" label="Descripción producto" placeholder="Descripción"/>
            <x-form-input name="pvp" label="Precio producto (€)" placeholder="Precio" type="number" step='0.01' min='0'/>
            <x-form-input name="stock" label="Cantidad de producto" placeholder="Cantidad" type="number" step='1' min='0'/>
            <x-form-select name="categorias" label="Categoría" :options="$categorias"/>
            {{-- {{$categorias->nombre}} esto no funciona --}}
            <x-form-select name="proveedor" label="Proveedor" :options="$proveedors" />
            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
        {{-- 'nombre', 'descripcion', 'pvp', 'stock', 'imagen', 'categoria_id', 'proveedor_id' --}}

    </div>

</x-app-layout>
