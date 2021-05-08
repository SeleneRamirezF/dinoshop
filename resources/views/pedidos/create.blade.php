<x-app-layout>
    <x-slot name="header">
        <script src="{{ asset('js/compras.js') }}"></script>
        <script type="text/javascript" src="/js/compras.js"></script>
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
                <select class="form-select mt-1 block w-full" name="proveedor"  id="provider_id">
                  @foreach ($proveedors as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Usuario</span>
                <select class="form-select mt-1 block w-full" name="user" id="user">
                  @foreach ($usuarios as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
            </label>
            <label class="block mt-4">
                <span class="text-gray-700">Producto</span>
                <select class="form-select mt-1 block w-full" name="productos" id="product_id">
                  @foreach ($productos as $item)
                      <option value="{{$item->id}}">{{$item->nombre}}</option>
                  @endforeach
                </select>
            </label>
            <x-form-input name="cantidad" id="quantity" label="Cantidad de producto" placeholder="Cantidad" type="number" step='1' min='0'/>
            <x-form-input name="pvp" id="price" label="Precio compra (€)" type="number" step='0.01' min='0'/>

            <div class="my-4">
                <button id="agregar" class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
                    <i class="fas fa-cart-plus"></i> Agregar Producto
                </button>
            </div>

            {{-- tabla de productos --}}
            <div>
                <table id="detalles" class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-50">
                        <tr class="text-gray-600 text-left">
                            <th class="font-semibold text-sm uppercase px-6 py-4">
                                Producto
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Precio(€)
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Cantidad
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="inline-flex w-10 h-10">
                                        <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200'>
                                    </div>
                                    <div>
                                        <p class="">
                                            Jane Doe
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="">
                                    Patwari at Betul
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">

                            </td>
                            <td class="px-6 py-4 text-center">
                                <p id="total">0.00</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="#" class="text-purple-800 hover:underline">Borrar</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td class="px-6 py-4">
                            TOTAL
                            <p>
                                <span id="total_pagar_html">0.00</span>
                                <input type="hidden" name="total" id="total_pagar">
                            </p>
                        </td>
                    </tfoot>
                </table>
            </div>
            {{-- fin tabla de productos --}}


            <div class="flex justify-end">
                <x-form-submit id="guardar" >
                    <span class="text-white-900"><i class="fas fa-plus"></i> Crear</span>
                </x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
