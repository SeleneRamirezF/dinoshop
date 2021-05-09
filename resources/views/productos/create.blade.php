<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Crear Producto'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-mensajes-alertas />
        <form name="create" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
            @csrf
            <x-form-input name="nombre" label="Nombre producto" placeholder="Nombre"/>
            <x-form-textarea name="descripcion" label="Descripción producto" placeholder="Descripción"/>
            <x-form-input name="pvp" label="Precio producto (€)" placeholder="Precio" type="number" step='0.01' min='0'/>
            <x-form-input name="stock" label="Cantidad de producto" placeholder="Cantidad" type="number" step='1' min='0'/>
            <label class="block mt-4">
                <span class="text-gray-700">Categoría</span>
                <select class="form-select mt-1 block w-full" name="categoria_id">
                  @foreach ($categorias as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Proveedor</span>
                <select class="form-select mt-1 block w-full" name="proveedor_id">
                  @foreach ($proveedors as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
            </label>

            <div>
              <label class="block mt-4 text-md font-medium text-gray-700">
                Imagen del producto
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                  aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0
                    00-5.656 0L28
                      28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <input name="imagen" type="file"/>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-end">
                <x-form-submit>
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
