$(document).ready(function() {
    cargarTabla();
});

function cargarTabla() {
  $.ajax({
    url: "http://127.0.0.1:8000/sociedades/list",
    type: 'GET',
    dataType: 'JSON',
    success: function(response){
        console.log(response);
        $('#tabla-sociedades tbody').empty();
        $.each(response, function(index, sociedad) {
            var fila = '<tr>' +
              '<td>' + sociedad.id + '</td>' +
              '<td>' + sociedad.nombre_sociedades + '</td>' +
              '<td>' + 
                "<button type='button' id='btnSeleccionar' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#sociedadesModal'>Editar</button>" +
                "<button type='button' value="+sociedad.id+" class='btn btn-danger' id='btnEliminar'>Eliminar</button>" +
              '</td>' +
              '</tr>';
            $('#tabla-sociedades tbody').append(fila);
          });
        },
        error: function(xhr, status, error) {
          console.log(error); // Maneja los errores de acuerdo a tus necesidades
        }
    }
  )
}

//guardar
$("#btnGuardar").on("click", function() {
  event.preventDefault();
  
  var sociedad = {
    nombre_sociedades: $("#nombre_sociedades").val()
  }
    $.ajax({
      url: "http://127.0.0.1:8000/sociedades/save",
      type: "POST",
      dataType: "JSON",
      data: sociedad,
      success: function(response) {
        console.log(response);
        Swal.fire({
          icon: 'success',
          title: 'Sociedad guardada con exito',
          showConfirmButton: false,
          timer: 3000
        })
        $("#nombre_sociedades").val('');
        cargarTabla();
      },
      error: function(error) {
        console.log(error);
        Swal.fire({
          icon: 'error',
          title: 'Ocurrio un error contacte al programador',
          showConfirmButton: false,
          timer: 3000
        })
      }
    })
});

//obtener una sociedad en el modal
$("#btnSeleccionar").on("click", function() {
  event.preventDefault();
  console.log('entrando');
    var id = $(this).val();
    $.ajax({
      url: "http://127.0.0.1:8000/sociedades/list/"+id,
      type: "GET",
      dataType: "JSON",
      success: function(response) {
        console.log(response);
      },
      error: function(xhr, status, error) {
        console.log(error)
      }
    });
});