window.onload = iniciar;

function iniciar(){

    //let agregar = document.getElementById("agregar");
    //agregar.addEventListener("click", agregar);
    $(document).ready(function () {
        $("#agregar").click(function () {
            agregar();
        });
    });

    let cont = 0;
    let total = 0;
    let subtotal = [];

    $("#guardar").hide();

    //var product_id = $('#product_id');

}

// product_id.change(function(){
//     $.ajax({
//         url: "{{route('get_products_by_id')}}",
//         method: 'GET',
//         data:{
//             product_id: product_id.val(),
//         },
//         success: function(data){
//             $("#code").val(data.code);
//         }
//     });
// });
// $(obtener_registro());
// function obtener_registro(code){
//     $.ajax({
//         url: "{{route('get_products_by_barcode')}}",
//         type: 'GET',
//         data:{
//             code: code
//         },
//         dataType: 'json',
//         success:function(data){
//             console.log(data);
//             $("#product_id").val(data.id);
//         }
//     });
// }
// $(document).on('keyup', '#code', function(){
//     var valorResultado = $(this).val();
//     if(valorResultado!=""){
//         obtener_registro(valorResultado);
//     }else{
//         obtener_registro();
//     }
// })

function agregar() {

    // let id_procucto = document.getElementById("producto");
    // let pro = id_procucto.option[id_procucto.selectedIndex].value;
    // console.log(id_procucto);
    // console.log(pro);

    product_id = $("#product_id").val();
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    price = $("#price").val();
    // impuesto = $("#tax").val();
  if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
        subtotal[cont] = quantity * price;
        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td></tr>';
        //var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" id="price[]" name="price[]" value="' + price + '"> <input class="form-control" type="number" id="price[]" value="' + price + '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled> </td> <td align="right">s/' + subtotal[cont] + ' </td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);
    } else {
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la compras',
        })
    }
}

function limpiar() {
    $("#quantity").val("");
    $("#price").val("");
}

function totales() {
    $("#total").html(total.toFixed(2));
    //total_impuesto = total * impuesto / 100;
    total_pagar = total;// + total_impuesto;
   // $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
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
    //total_impuesto = total * impuesto / 100;
    total_pagar_html = total;// + total_impuesto;
    $("#total").html(total);
    //$("#total_impuesto").html("PEN" + total_impuesto);
    $("#total_pagar_html").html(total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}
