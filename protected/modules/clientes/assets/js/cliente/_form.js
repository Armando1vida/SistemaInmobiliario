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