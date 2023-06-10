$(document).ready(function(){
    cargarTabla();
});

function cargarTabla() {
    $.ajax({
        url: "http://127.0.0.1:8000/miembros/list",
        type: "GET",
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $.each(response, function(index, miembro) {
                var fila = "<tr>" +
                            "<td>" +miembro.id+ "</td>" +
                            "<td>" +miembro.nombre_miembro+ "</td>" +
                            "<td>" +miembro.apellido_miembro+ "</td>" +
                            "<td>" +miembro.nombre_sociedades+ "</td>" +
                            "<td>" +miembro.nombre_privilegio+ "</td>" +
                            "<td>" +
                            "<button type='button' data-bs-toggle='modal' data-bs-target='#miembrosModal' class='btn btn-info'>Editar</button>" +
                            "<button type=button' class='btn btn-danger'>Eliminar</button>" +
                            "</td>" +
                            "</tr>";
                $("#tablaMiembros tbody").append(fila);
            })
        },
        error: function (error) {
            console.log(response.error);
        }
    })
}