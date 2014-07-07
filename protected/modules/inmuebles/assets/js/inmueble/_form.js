/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    /**
     * carga de ciudades
     */
    $("#Direccion_provincia_id").change(function() {
//        console.log('entro');
        AjaxListaCiudades("Direccion_provincia_id", "Direccion_ciudad_id");
    });
    $("#Direccion_ciudad_id").change(function() {
        AjaxListaBarrios("Direccion_ciudad_id", "Direccion_barrio_id");
    });
    // submit de $('#inmueble-form')
//    $('#inmueble-form').submit(function(e) {
//        e.preventDefault();
//    });
});

function AjaxListaCiudades(lista, lista_actualizar)
{
//    s2id_ciudad_id
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "clientes/direccion/ajaxGetCiudadesProvincia",
            {provincia_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
//        $("#" + lista_actualizar).selectBox("refresh");

    });
}
function AjaxListaBarrios(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "clientes/direccion/ajaxGetBarriosCiudad",
            {ciudad_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
//        $("#" + lista_actualizar).selectBox("refresh");

    });
}
function AjaxCargarListas(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            callBack(data);
        }
    });
}

function guardarInmueble(url) {
//    $('#inmueble-form').submit(function(e) {
//        e.preventDefault();
//    });
//    $('#inmueble-form').submit();
    var $archivos = [];
    $('.archivosNota').each(function(index) {
        $archivos.push(
                {
                    nombreArchivo: $(this).attr('title'),
                    url: $(this).attr('url'),
                    filename: $(this).attr('filename'),
                });
    });
//    console.log(JSON.stringify($archivos));
    $('#archivosData').val(JSON.stringify($archivos));
    $('#inmueble-form').submit();

//
////    console.log(url, $archivos);
//    $.ajax({
//        type: "POST",
//        url: url,
////        dataType: 'json',
//        data: {Inmueble: $('#inmueble-form').serialize(), Imagenes: $archivos},
//        success: function(data) {
////            if (data.success) {
////                $('#Nota_contenido').val('');
////                $('#Nota_id').val('');
////                $('.files').empty();
////                $.fn.yiiGridView.update('notas-grid');
////                AjaxActualizarActividades();
////            } else {
////                bootbox.alert(data.error);
////            }
//        }
//    });
}

