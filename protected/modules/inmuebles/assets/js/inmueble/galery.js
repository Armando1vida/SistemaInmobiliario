/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function comprar(id) {
    $.ajax({
        url: baseUrl + 'inmuebles/inmueble/ajaxComprar',
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        beforeSend: function(xhr) {
//            $("#Contacto_cedula").html('');
//            $("#Contacto_cedula").removeClass('error');
//            $("#contenerForm").removeClass('error');
//            showModalLoading();
        },
        success: function(data, textStatus, jqXHR) {
            if (data.success) {
                bootbox.alert('Su compra se realizo con éxito.');
                setTimeout('redireccion(' + id + ')', 5000);
            } else {
                bootbox.alert(data.message);
            }
        }

    });
//    console.log(id);
}
function arrendar(id) {
//    console.log(id);
 $.ajax({
        url: baseUrl + 'inmuebles/inmueble/ajaxArrendar',
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        beforeSend: function(xhr) {
//            $("#Contacto_cedula").html('');
//            $("#Contacto_cedula").removeClass('error');
//            $("#contenerForm").removeClass('error');
//            showModalLoading();
        },
        success: function(data, textStatus, jqXHR) {
            if (data.success) {
                bootbox.alert('Su petición se realizo con éxito.');
                setTimeout('redireccion(' + id + ')', 5000);
            } else {
                bootbox.alert(data.message);
            }
        }

    });
}
function reservar(id) {
//    console.log(id);
 $.ajax({
        url: baseUrl + 'inmuebles/inmueble/ajaxReservar',
        type: 'GET',
        data: {id: id},
        dataType: 'json',
        beforeSend: function(xhr) {
//            $("#Contacto_cedula").html('');
//            $("#Contacto_cedula").removeClass('error');
//            $("#contenerForm").removeClass('error');
//            showModalLoading();
        },
        success: function(data, textStatus, jqXHR) {
            if (data.success) {
                bootbox.alert('Su reserva se realizo con éxito.');
                setTimeout('redireccion(' + id + ')', 5000);
            } else {
                bootbox.alert(data.message);
            }
        }

    });
}
function redireccion(id) {
    document.location.href = baseUrl + 'inmuebles/inmueble/view?id=' + id;

}