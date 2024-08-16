<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akatsuki</title> <!-- Título dinámico -->
    <!-- plantilla base para todas las vistas -->
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
                <a class="nav-link" href="/proyectos">Proyectos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crearProyect">Crear proyecto</a>
            </li>
           
        </ul>
    </div>
</nav>
    
   
    <div><h2>datos del usuario</h2></div>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
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
    
    <!-- Incluir los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
   
    
    
</body>
</html>
