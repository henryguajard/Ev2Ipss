<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('usuario.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="color: white;">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>
        
        <!-- Datos del usuario -->
        <h2>Datos del usuario</h2>
        <table class="table table-bordered mb-4">
            <tr>
                <th>Nombre</th>
                <td>{{ $user->nombre }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
        
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <h3>Crear Proyecto</h3>
                    <div class="border p-4 rounded">
                        <form action="{{ route('proyectos.create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Proyecto</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="responsable" class="form-label">Nombre del Responsable</label>
                                <input type="text" class="form-control" name="responsable" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="monto" class="form-label">Monto</label>
                                <input type="number" class="form-control" name="monto" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Agregar Proyecto</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Proyectos Creados</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Fecha de Inicio</th> <!-- Nueva columna -->
                                <th>Responsable</th>     <!-- Nueva columna -->
                                <th>Monto</th>          <!-- Nueva columna -->
                                <th>Acciones</th</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td>{{ $registro->nombre }}</td>
                                    <td>{{ $registro->activo ? 'Activo' : 'Inactivo' }}</td>
                                    <td>{{ $registro->fecha_inicio }}</td> <!-- Nueva columna -->
                                    <td>{{ $registro->responsable }}</td>  <!-- Nueva columna -->
                                    <td>{{ $registro->monto }}</td>        <!-- Nueva columna -->
                                    <td>
                                        <!-- Aquí puedes agregar acciones, como editar o eliminar -->
                                        <button class="btn btn-warning btn-sm">Editar</button>
                                        <form action="{{ route('proyectos.destroy', $registro->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
