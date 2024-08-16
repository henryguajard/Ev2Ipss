<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--AldminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!--boostrap --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Font awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!--Custom CSS -->
    
    @yield('css')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
    <div class="wrapper">
      <!--Navbar -->  
      @include('partials.navbar')
      <!--Sidebar -->  
      @include('partials.sidebar')

      <!--Content Wrapper. Contains page content --> 
      <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" >
                    <div class="col-sm-6">
                        <h1>@yield('page-title')</h1>
                    </div>
                    <div class="col-sm-6 tezt-end">
                        @yield('btn-add')
                    </div>
                </div>
            </div>

        </section>
        <section class="content">
           @yield('content')
        </section>
      </div>

       <!--footer --> 
       @include('partials.footer')
    </div>
       <!--./wrapper --> 

       <!--jQuery --> 
       <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
       <!--boostrap --> 
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
       <!--adminLTE app -->
       <script src="{{ asset('dist/js/adminlte.min.js')}}"></script> 
       <!--Custom JS -->
       @yield('scripts')
    
</body>
</html>