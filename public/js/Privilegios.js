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
                     '<button class="btn btn-info" data-id="' + privilegio.id + '">Editar</button>' +
                     '<button class="btn btn-danger" data-id="' + privilegio.id + '">Eliminar</button>' +
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