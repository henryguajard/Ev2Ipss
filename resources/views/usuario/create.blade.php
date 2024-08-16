<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crear-IPSS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box" style="margin-top: 250px;"> <!-- Se añadió un margen superior -->
        <!-- Mensajes de error -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div class="card ">
            <div class="card-header text-center">
                <img src="{{ asset('imgs/logo_ipss.png')}}" alt="logo ipss" width="150px">
                <h1 class="h4 mt-3">Crear Usuarios</h1>
            </div>
            <div class="card-body">
                <form action="{{route('usuario.registrar')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresar Nombre">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Ingresar Email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingresar Contraseña">
                    </div>

                    <div class="mb-3">
                        <label for="rePassword" class="form-label">Confirmar Contraseña</label>
                        <input type="password" name="rePassword" id="rePassword" class="form-control" placeholder="Ingresar nuevamente su Contraseña">
                    </div>

                    <div class="mb-3">
                        <label for="dayCode" class="form-label">Código del Día</label>
                        <input type="text" name="dayCode" value="15" id="dayCode" class="form-control" placeholder="Ingresar código del día">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
