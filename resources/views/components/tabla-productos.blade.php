<div class="my-4">
    <button id="agregar" class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-4 shadow">
        <i class="fas fa-cart-plus"></i> Agregar Producto
    </button>
</div>

{{-- tabla de productos --}}
<div>
    <table id="detalles" class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300
    overflow-hidden'>
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
            {{-- <tr>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4"></td>
                <td class="px-6 py-4 text-center"></td>
                <td class="px-6 py-4 text-center"></td>
                <td class="px-6 py-4 text-center">
                    <a href="#" class="text-purple-800 hover:underline">Borrar</a>
                </td>
            </tr> --}}
        </tbody>
        <tfoot>
            <tr>
                <th class="px-6 py-4">
                    <p>TOTAL</p>
                </th>
                <th>
                    <p>
                        <span id="total">0.00</span>
                        {{-- <input type="hidden" name="total" id="total"> --}}
                    </p>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
{{-- fin tabla de productos --}}
