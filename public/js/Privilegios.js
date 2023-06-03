$(document).ready(function() {
    cargarDatos();
});

function cargarDatos() {
    $.ajax({
      url: 'http://127.0.0.1:8000/privilegio/list',  // Reemplaza '/api/datos' con la URL correcta de tu API
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        console.log(response);
        $('#tabla-privilegios tbody').empty();
        $.each(response, function(index, privilegio) {
          var fila = '<tr>' +
                     '<td>' + privilegio.id + '</td>' +
                     '<td>' + privilegio.nombre_privilegio + '</td>' +
                     '<td>' +
                     '<button type="button" data-bs-toggle="modal" data-bs-target="#privilegiosModal" class="btn btn-info" onclick="seleccionar('+privilegio.id+')">Editar</button>' +
                     '<button type="button" class="btn btn-danger" onclick="eliminar('+privilegio.id+')">Eliminar</button>' +
                     '</td>' +
                     '</tr>';

          $('#tabla-privilegios tbody').append(fila);
        });
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
}

$("#btnGuardar").on("click", function() {
    var privilegio = {
        nombre_privilegio: $("#nombre_privilegio").val()
    }
    $.ajax({
        url: "http://127.0.0.1:8000/privilegio/save",
        type: "POST",
        dataType: "JSON",
        data: privilegio,
        success: function(response) {
            console.log(response);
            Swal.fire({
            icon: 'success',
            title: 'privilegio guardado con exito',
            showConfirmButton: false,
            timer: 3000
            })
            $("#nombre_privilegio").val("");
            cargarDatos();
        },
        error: function(error) {
            console.log(error);
        }
    });
});

function eliminar(id) {
    console.log(id);
    Swal.fire({
        title: 'Eliminar!',
        text: "Estas seguro de eliminar este privilegio?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "http://127.0.0.1:8000/privilegio/delete/"+id,
                type: "DELETE",
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    Swal.fire(
                        'Eliminado!',
                        'El privilegio se ha eliminado con exito',
                        'success'
                    )
                    cargarDatos();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    })
}

function seleccionar(id) {
    $("#btnGuardar").hide();
    $("#btnEditar").show();
    var nombre_privilegio = $("#nombre_privilegio").val();
    $.ajax({
        url: "http://127.0.0.1:8000/privilegio/list/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
            $('#nombre_privilegio').val(response.nombre_privilegio);
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    })
}

$("#btnCancelar").on("click", function() {
    $("#nombre_privilegio").val("");
    console.log("click en cancelar");
    $("#btnGuardar").show();
    $("#btnEditar").hide();
})

$('#btnEditar').on('click', function() {
    var nombre_privilegio = $('#nombre_privilegio').val();
    $.ajax({
        url: "http://127.0.0.1:8000/privilegio/update/"+id,
        type: 'PUT',
        dataType: 'json',
        data: {
            nombre_privilegio: nombre_privilegio
        },
        success: function(response) {
            console.log(response);
            Swal.fire({
            icon: 'success',
            title: 'privilegio editado con exito',
            showConfirmButton: false,
            timer: 3000
            })
            $("#nombre_privilegio").val("");
            cargarDatos();
        },
        error: function(error) {
            console.log(error);
        }
    });
});