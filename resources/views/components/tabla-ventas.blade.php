<div class="min-h-full mt-3 flex items-center px-2">
    <div class='overflow-x-auto w-full'>

        <table id="detalles"
            class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
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
            </tbody>
            <tfoot>
                <tr>
                    <th class="px-6 py-4">
                        <p>TOTAL</p>
                    </th>
                    <th>
                        <p>
                            <span id="total">0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
        <div class="flex justify-end">
            <x-form-submit id="guardar">
                <span class="text-white-900"><i class="fas fa-plus"></i> Terminar Venta</span>
            </x-form-submit>
        </div>
    </div>
</div>
