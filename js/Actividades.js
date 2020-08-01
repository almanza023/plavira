$(function() {
    $('#cargando').hide();
    $('#fecha_entrega').focus();
    $('#Guardar').click(function() {

        if ($('#ciclo_id').val() == 0) {
            $('#ciclo_id').focus()
            swal("Datos Básicos", "Debe Seleccionar Un Ciclo", "warning", "Cool");

        } else if ($('#area_id').val() == 0) {
            $('#area_id').focus()
            swal("Datos Básicos", "Debe Seleccionar Un Aréa", "warning", "Cool");

        } else if ($('#fecha_entrega').length == 0) {
            $('#fecha_entrega').focus()
            swal("Datos Básicos", "Debe Especificar una Fecha de Entrega", "warning", "Cool");

        } else {
            SubirFotos();
        }
    }); //Capturamos el evento click sobre el boton con el id=enviar  y ejecutamos la función seleccionado.
});

function validar() {
    // Obtener nombre de archivo
    let archivo = document.getElementById('archivo').value,
        // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
    // Si la extensión obtenida no está incluida en la lista de valores
    // del atributo "accept", mostrar un error.
    if (!document.getElementById('archivo').getAttribute('accept').split(',').indexOf(extension) < 0) {
        swal("Archivo inválido", "No se permite la extensión" + extension, "error", "Cool");

    }
}

function SubirFotos() {

    $('#Guardar').hide();
    var archivos = document.getElementById("archivo"); //Creamos un objeto con el elemento que contiene los archivos: el campo input file, que tiene el id = 'archivos'
    var archivo = archivos.files; //Obtenemos los archivos seleccionados en el imput
    //Creamos una instancia del Objeto FormDara.
    var formElement = document.getElementById("form");
    var archivos = new FormData(formElement);
    /* Como son multiples archivos creamos un ciclo for que recorra la el arreglo de los archivos seleccionados en el input
    Este y añadimos cada elemento al formulario FormData en forma de arreglo, utilizando la variable i (autoincremental) como 
    indice para cada archivo, si no hacemos esto, los valores del arreglo se sobre escriben*/
    for (i = 0; i < archivo.length; i++) {
        archivos.append('archivo' + i, archivo[i]); //Añadimos cada archivo a el arreglo con un indice direfente
    }
    let form = $('#form');
    /*Ejecutamos la función ajax de jQuery*/
    $.ajax({

        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        contentType: false, //Debe estar en false para que pase el objeto sin procesar
        data: archivos, //Le pasamos el objeto que creamos con los archivos
        processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
        cache: false //Para que el formulario no guarde cache
    }).done(function(data) { //Escuchamos la respuesta y capturamos el mensaje msg
        if (data.success) {

            $('#cargando').show();
            $('#divdatos').hide();
            setTimeout(function() {
                $("#form")[0].reset();
                swal("Datos Básicos", "Datos Cargados Exitosamente", "success", "Cool");
                $('#divdatos').show();
                $('#cargando').hide();
                $('#Guardar').show();
            }, 3000);


        } else {
            swal("Datos Básicos", 'Se Ha Producido Un Error al Registrar la Actividad', "error", "Cool");

        }
    });
}

function MensajeFinal(msg) {
    $('.mensage').html(msg); //A el div con la clase msg, le insertamos el mensaje en formato  thml
    $('.mensage').show('slow'); //Mostramos el div.
}