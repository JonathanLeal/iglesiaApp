<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Privilegios</title>
</head>
<body>
    
    <!--INICIO DE NAV-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">INICIO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/sociedades">Sociedades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/privilegios">Privilegios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/miembros">Miembros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/escuela">Escuela</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/session">Session</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!--FIN DE NAV-->

<!--INICIO DE Tabla-->
<div class="container">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3>Lista de privilegios</h3>
        <!-- BUTON para abri modal de sociedades -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privilegiosModal">
          Nueva sociedad
        </button>
        <!-- BUTON para abri modal de sociedades -->

        <!-- Modal INCIO SOCIEDADES-->
      <div class="modal fade" id="privilegiosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Informacion de privilegio</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="nombre_privilegio">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_privilegio" placeholder="Nombre del privilegio">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancelar">Cancelar</button>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnGuardar">Guardar</button>
              <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnEditar" style="display: none;">Editar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal FIN SOCIEDADES-->

        <table id="tabla-privilegios" class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre del privilegio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
<!--FIN DE tabla-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('js/Privilegios.js')}}"></script>
</body>
</html>