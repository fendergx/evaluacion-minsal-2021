    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{route('inicio')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('establecimiento.index')}}">Establecimientos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('medico.index')}}">Médicos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('medicamento.index')}}">Medicamentos</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Listado de recetas</a>
              <div class="dropdown-menu dropdown-menu-right animate slideIn shadow" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="{{route('medico.seleccion')}}">Emitidas por médicos</a>
                <a class="dropdown-item" href="{{route('establecimiento.seleccion')}}">Emitidas por establecimiento</a>
              </div>
            </li>

          </ul>
        </div>
      </nav>
    </header> 