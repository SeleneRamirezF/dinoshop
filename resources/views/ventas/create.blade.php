<x-app-layout>
    <x-slot name="header">
        <script src="{{ asset('js/ventas.js') }}"></script>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Crear Venta' }}
        </h2>
    </x-slot>

    <div class="container mt-3 mx-auto p-2 w-4/5">

        <x-mensajes-alertas />

        <form name="create" method="POST" action="{{ route('ventas.store') }}" enctype="multipart/form-data">
            @csrf

            <input id="cliente_id" name="cliente_id" type="hidden" value="1">

            <label class="block mt-4">
                <span class="text-gray-700 text-bold text-2xl">Productos</span>
                <select class="form-select mt-1 block w-full" name="producto_id" id="producto_id">
                    @foreach ($productos as $producto)
                        <option class="option" value="{{ $producto->id }}" data-pvp="{{ $producto->pvp }}">
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </label>

            <x-form-input name="cantidad" id="cantidad" label="Cantidad de producto" placeholder="Cantidad"
                type="number" step='1' min='0' />
            <x-form-input name="pvp" id="pvp" label="Precio compra(€)" type="number" min='0' disabled />

            <div class="my-4">
                <button id="agregar"
                    class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </div>

            <x-tabla-ventas />

        </form>
    </div>

</x-app-layout>
