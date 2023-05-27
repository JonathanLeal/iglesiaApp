$(document).ready(function() {
    $.ajax({
        url: "http://127.0.0.1:8000/sociedades/list",
        type: 'GET',
        dataType: 'JSON',
        success: function(response){
            console.log(response);
            $.each(response, function(index, sociedad) {
                var fila = '<tr>' +
                  '<td>' + sociedad.id + '</td>' +
                  '<td>' + sociedad.nombre_sociedades + '</td>' +
                  '</tr>';
                $('#tabla-sociedades tbody').append(fila);
              });
            },
            error: function(xhr, status, error) {
              console.log(error); // Maneja los errores de acuerdo a tus necesidades
            }
        }
    )
});