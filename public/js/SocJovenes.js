$(document).ready(function() {
    $('#myTable').DataTable({
        ajax: {
            url: 'http://127.0.0.1:8000/socJovenes/list',
        },
        columns: [
            { data: 'id' },
            { data: 'nombre_soc_jovenes' }
        ]
    });
});