<x-app-layout>
    <x-slot name="header">
        <script src="{{ asset('js/compras.js') }}"></script>
        {{-- <script type="text/javascript" src="/js/compras.js"></script> --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Crear Pedido'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

        <x-mensajes-alertas />{{-- ['proveedor_id', 'user_id', 'fecha', 'total', 'estado']; --}}

        <form name="create" method="POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
            @csrf
            <label class="block mt-4">
                <span class="text-gray-700">Proveedor</span>
                <select class="form-select mt-1 block w-full" name="proveedor_id" id="proveedor_id">
                  @foreach ($proveedors as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Producto</span>
                <select class="form-select mt-1 block w-full" name="producto_id" id="producto_id">
                  @foreach ($productos as $producto)
                      <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <x-form-input name="cantidad" id="cantidad" label="Cantidad de producto" placeholder="Cantidad" type="number" step='1'
            min='0'/>
            <x-form-input name="pvp" id="pvp" label="Precio compra(€)" type="number" step='0.01' min='0'/>

            <x-tabla-productos />

            <div class="flex justify-end">
                <x-form-submit id="guardar">
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear Pedido</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
