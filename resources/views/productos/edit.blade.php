<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Modificar Producto' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

        <x-mensajes-alertas />

        <form name="create" method="POST" action="{{ route('productos.update', $producto) }}"
            enctype="multipart/form-data">
            @csrf
            @method("PUT")
            @bind($producto)
            <x-form-input name="nombre" label="Nombre producto" />
            <x-form-textarea name="descripcion" label="Descripción producto" />
            <x-form-input name="pvp" label="Precio producto (€)" type="number" step='0.01' min='0' />
            <x-form-input name="stock" label="Cantidad de producto" type="number" step='1' min='0' />
            <label class="block mt-4">
                <span class="text-gray-700">Categoría</span>
                <select class="form-select mt-1 block w-full" name="categoria_id">
                    @foreach ($categorias as $item)
                        @if ($item->id == $producto->categoria->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Proveedor</span>
                <select class="form-select mt-1 block w-full" name="proveedor_id">
                    @foreach ($proveedors as $item)
                        @if ($item->id == $producto->proveedor->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            <div>
                <label class="block mt-4 text-md font-medium text-gray-700">
                    Imagen del producto
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <img class="w-32 h-32 rounded-full mx-auto" src="{{ asset($producto->imagen) }}"
                                alt="{{ $producto->nombre }}">
                            <input name="imagen" type="file" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-edit"></i> Modificar producto</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
