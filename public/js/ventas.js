$(document).ready(function () {

    $(document).on('change', '#producto_id', function (event) {
        $('#pvp').val($("#producto_id").find(":selected").data("pvp"));
    });

    $("#agregar").click(function (event) {
        event.preventDefault();
        agregar();
    });

});

let cont = 0;
let total = 0;
let subtotal = [];

function agregar() {

    product_id = $("#producto_id").find(":selected").val();
    producto = $("#producto_id option:selected").text();
    quantity = $("#cantidad").val();
    price = $("#pvp").val();

    if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
        subtotal[cont] = quantity * price;
        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila' + cont + '"><td><input class="form-control text-center" type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input class="form-control text-center" type="hidden" id="price[]" name="precio[]" value="' + price + '"> <input class="form-control text-center" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input class="form-control text-center" type="hidden" name="cantidad1[]" value="' + quantity + '"> <input class="form-control text-center" type="number" value="' + quantity + '" disabled> </td> <td class="text-center">' + subtotal[cont] + ' € </td><td><button class="bg-red-500 w-10 h-10 p-3 text-sm font-bold tracking-wider text-white rounded-full hover:bg-blue-600 inline-flex items-center justify-center" onclick="eliminar(' + cont + ');"><i class="fas fa-times"></i></button></td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
    } else {
        alert('Error:\nRellene todos los campos del detalle de la compras')
    }
}

function limpiar() {
    $("#quantity").val("");
    $("#price").val("");

}

function totales() {
    $("#total").html(total.toFixed(2));
    total_pagar = total;
    $("#total_pagar_html").html(total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}

function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}

function eliminar(index) {
    total = total - subtotal[index];
    total_pagar_html = total;
    $("#total").html(total);
    $("#total_pagar_html").html(total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}
