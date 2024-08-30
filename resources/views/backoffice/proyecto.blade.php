<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos-akatsuki</title>
    <!-- Incluir Bootstrap desde un CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir CSS adicional -->
    <link href="{{ asset('') }}" rel="stylesheet"> <!-- Si tienes CSS personalizado -->
  
</head>
<body>
    <!-- Barra de navegación común -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Mi Aplicación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                 <!-- Barra de navegación común 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backoffice.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('proyecto.index') }}">Crear proyecto</a>
                </li>-->
                <li class="nav-item">
                    <form action="{{ route('usuario.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white" style="padding: 0;">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    
    <div id="akatsuki" class="container mt-4">
        <!-- Datos del Usuario -->
        <div class="row">
            <div class="col-12">
                <h4 style="font-size: 1.5rem;">Datos del Usuario</h4>
                <table class="table table-sm table-bordered" style="font-size: 0.9rem;">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Campo</th>
                            <th style="width: 60%;">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $user->nombre }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>{{ $user->activo ? 'Activo' : 'Inactivo' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-md-6 col-lg-4"> <!-- Columna para el formulario -->
                <h1>Crear proyectos</h1>
                <div class="border p-4"> <!-- Borde y padding alrededor del formulario -->
                    <form action="{{ route('proyecto.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_de_inicio">Fecha de Inicio:</label>
                            <input type="date" id="fecha_de_inicio" name="fecha_de_inicio" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="responsable">Responsable:</label>
                            <input type="text" id="responsable" name="responsable" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="monto">Monto:</label>
                            <input type="number" id="monto" name="monto" step="0.01" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Crear Proyecto</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 col-lg-8"> <!-- Columna para los proyectos creados -->
                <h3>Proyectos Creados</h3>
                @if(isset($datos) && $datos->isEmpty())
                    <p>No tienes proyectos creados.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de Inicio</th>
                                <th>Estado</th>
                                <th>Monto</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $proyecto)
                                <tr>
                                    <td>{{ $proyecto->nombre }}</td>
                                    <td>{{ $proyecto->fecha_de_inicio }}</td>
                                    <td>{{ $proyecto->activo ? 'Activo' : 'Inactivo' }}</td>
                                    <td>{{ $proyecto->monto }}</td>
                                    <td>{{ $proyecto->responsable }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white py-4">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h5>acerca de nosotros</h5>
             
            </div>
            <div class="col-md-4">
              <h5>enlaces</h5>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Home</a></li>
                <li><a href="#" class="text-white">Servicios</a></li>
                <li><a href="#" class="text-white">Contacto</a></li>
                <li><a href="#" class="text-white">Politicas de Privacidad</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h5>contactanos</h5>
            
            </div>
          </div>
          <div class="text-center mt-3">
            <p class="mb-0">&copy; akatsuki.todos los derechos reservados</p>
          </div>
        </div>
      </footer>
      
    <!-- Incluir los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
