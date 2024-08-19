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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mi Aplicación</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('backoffice.dashboard') }}">Dashboard</a>
                </li>
               
                
            </ul>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h1 class="mb-4">Crear Proyectos</h1>
        <!-- Aquí va la tabla o lista de proyectos -->
        
        <form action="{{ url('/crearProyect') }}" method="POST" class="mb-4">
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
            <button type="submit" class="btn btn-primary">Crear Proyecto</button>
        </form>
    </div>

    <h3>Proyectos Creados</h3>
        @if(isset($proyectos) && $proyectos->isEmpty())
            <p>No tienes proyectos creados.</p>
        @elseif(isset($proyectos))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Inicio</th>
                        <th>Estado</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $proyecto)
                        <tr>
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->fecha_de_inicio }}</td>
                            <td>{{ $proyecto->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ $proyecto->monto }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Incluir los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
