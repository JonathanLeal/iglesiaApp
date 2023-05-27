<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <title>Sociedad Jovenes</title>
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
              <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Privilegios
                </button>
                <ul class="dropdown-menu dropdown-menu-primary">
                  <li><a class="dropdown-item" href="">Jovenes</a></li>
                  <li><a class="dropdown-item" href="SocSenioras">Señoras</a></li>
                  <li><a class="dropdown-item" href="socSeniores">Señores</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Miembros
                </button>
                <ul class="dropdown-menu dropdown-menu-primary">
                  <li><a class="dropdown-item" href="SocJovenes">Jovenes</a></li>
                  <li><a class="dropdown-item" href="SocSenioras">Señoras</a></li>
                  <li><a class="dropdown-item" href="socSeniores">Señores</a></li>
                </ul>
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
            <h3>Lista de sociedades</h3>
  
            <table id="tabla-sociedades" class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre Sociedades</th>
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
    <script src="{{asset('js/Sociedades.js')}}"></script>
</body>
</html>