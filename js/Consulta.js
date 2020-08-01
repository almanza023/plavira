$(function() {
    $('#ciclo_id').focus();
    $('#listado').hide();
    $('#cargando').hide();

    $('#btnBuscar').click(function() {
        $('#listado').hide();
        $('#cargando').hide();
        if ($('#ciclo_id').val() == 0) {
            $('#ciclo_id').focus()
            swal("Datos Básicos", "Debe Seleccionar Un Ciclo", "warning", "Cool");

        } else {
            consultar();
        }
    }); //Capturamos el evento click sobre el boton con el id=enviar  y ejecutamos la función seleccionado.
});


function consultar() {


    let form = $('#form');
    var ciclo_id = $('#ciclo_id').val();
    $.ajax({

        url: form.attr('action'),
        type: 'GET',
        dataType: 'html',
        contentType: false, //Debe estar en false para que pase el objeto sin procesar
        data: form.serialize(), //Le pasamos el objeto que creamos con los archivos
        processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
        cache: false //Para que el formulario no guarde cache
    }).done(function(data) { //Escuchamos la respuesta y capturamos el mensaje msg
        if (data) {
            $('#cargando').show();
            setTimeout(function() {
                $('#cargando').hide();

                $('#listado').show();
                $('#datos').html(data);


            }, 5000);



        } else {
            swal("Datos Básicos", 'Se Ha Producido Un Error al Registrar la Actividad', "error", "Cool");

        }
    });
}