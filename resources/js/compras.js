
$(document).ready(function () {
    $("#agregar").click(function (event) {
        event.preventDefault();
        agregar();
    });
});

let cont = 0;
let total = 0;
let subtotal = [];

function agregar() {

    let producto_id = $("#producto_id").val();
    let producto = $("#producto_id option:selected").text();
    let cantidad = $("#cantidad").val();
    let pvp = $("#pvp").val();

  if (producto_id != "" && cantidad != "" && cantidad > 0 && pvp != "") {
        subtotal[cont] = cantidad * pvp;
        total = total + subtotal[cont];
        let fila = '<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'
            +producto+'</td> <td> <input type="hidden" id="pvp[]" name="pvp[]" value="'
            + pvp + '"> <input class="form-control" type="number" id="pvp[]" value="'
            + pvp + '" disabled> </td>  <td> <input type="hidden" name="cantidad[]" value="'
            + cantidad + '"> <input class="form-control" type="number" value="'
            + cantidad + '" disabled> </td> <td align="right">s/'
            + subtotal[cont] + ' </td><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('
            +cont+');"><i class="fa fa-times"></i></button></td></tr>';
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
    $("#cantidad").val("");
    $("#pvp").val("");
}

function totales() {
    $("#total").html(total.toFixed(2));
    total_pagar = total;
    $("#total_pagar").val(total_pagar.toFixed(2));
}

function eliminar(index) {
    total = total - subtotal[index];
    $("#total").html(total);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}
