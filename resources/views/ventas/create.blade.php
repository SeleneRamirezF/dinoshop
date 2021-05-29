<x-app-layout>
    <x-slot name="header">
        <script src="{{ asset('js/ventas.js') }}"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{'Crear Venta'}}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

        <x-mensajes-alertas />{{--'cliente_id', 'user_id', 'fecha', 'total', 'estado' --}}

        <form name="create" method="POST" action="{{ route('ventas.store') }}" enctype="multipart/form-data">
            @csrf
            <label class="block mt-4">
                <span class="text-gray-700">Cliente</span>
                <x-form-input name="name" value="{{Auth::user()->name}}" label="Nombre Cliente" disabled/>
                <input id="cliente_id" name="cliente_id" type="hidden" value="1">
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Producto</span>
                <select class="form-select mt-1 block w-full" name="producto_id" id="producto_id">
                  @foreach ($productos as $producto)
                      <option class="option" value="{{$producto->id}}" data-pvp="{{$producto->pvp}}" >{{$producto->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <x-form-input name="cantidad" id="cantidad" label="Cantidad de producto" placeholder="Cantidad" type="number" step='1'
            min='0'/>
            <x-form-input name="pvp" id="pvp" label="Precio compra(€)" type="number" min='0' disabled/>

            <x-tabla-productos />

            <div class="flex justify-end">
                <x-form-submit id="guardar">
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear Venta</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
