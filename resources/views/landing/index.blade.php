<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Custom CSS -->
    
    @yield('css')
    <style>
        /* CSS personalizado para centrar el contenido */
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura completa de la ventana */
            padding-top: 50px; 
            box-sizing: border-box; /* Incluye padding en el cálculo de altura */
        }
        .card {
            width: 100%; /* Asegura que la tarjeta no se expanda más allá del contenedor */
            max-width: 320px; /* Máximo ancho para la tarjeta */
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="card card-outline">
        <div class="card-header ">
            <img src="{{ asset('imgs/logo_ipss.png')}}" alt="logo ipss" class="card-img-top " width="">
            
        </div>
        <div class="card-body ">
            
            <b>grupo Akatsuki</b>
        </div>
        <div class="card-footer ">
            <a href="{{ route('usuario.login')}}" class="btn btn-primary w-100">Iniciar Sesión</a>
        </div>
    </div>

   
</body>
</html>
