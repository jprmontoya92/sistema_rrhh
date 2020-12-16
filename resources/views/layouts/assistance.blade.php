<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
     <!--Font Awesome-->
     <script src="https://kit.fontawesome.com/6e66d244ab.js" crossorigin="anonymous"></script>
    </head>
    <title>Sistema de Asistencia</title>
<body>
    
    <header class="container mt-3 mb-4  ">
        <img class="rounded mx-auto d-block" src="{{asset('image/logo-ssas.jpg')}}" alt="">
    </header>

    <section>
       
        @yield('content')

    </section>

    <footer class="footer">
        <div class="my-3">
            <p class="text-center my-0">Sub Depto Gestión de la Información</p>
            <p class="text-center my-0">Sub Dirección de Desarrollo y Gestión de las Personas</p>
        </div>
      
        
    </footer>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>