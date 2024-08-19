<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login-IPSS</title>

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
<div class="login-box">
  <!-- /.login-logo -->
  <!-- errors -->
  @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
  @endif
  <!-- success -->
  @if (session('success'))
      <li>{{ session('success')}}</li>
  @endif
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="{{ asset('imgs/logo_ipss.png')}}" alt="logo ipss" width="150px">
        <br>
      <b>Instituto Profesional <br> San Sebastián</b> 
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingrese sus credenciales</p>

      <form action="{{route('usuario.validar')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="email" type="text" value="henroki1989@gmail.com" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" value="hola" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
          </div>
          <!-- /.col -->
          <p>si no tienes cuenta hazlo haciendo <br> <a href="{{ route('usuario.registrar')}}" class="btn btn-primary">Click Aqui</a>
        </div>
      </form>

    

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 
</div>
<!-- /.login-box -->


</body>
</html>
