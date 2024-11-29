<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contactos</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3AQ6Qe4W9iGmJwYoPzXvY7zW7i4kDkxxHh8roD0q5MxxolE4CUcQJHGA6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  <!-- Si tienes un archivo CSS personalizado -->
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76h5mSdhshfPlpQAcnsYZiQXmPflhzYQBeJh7alE9/5fo1S8XQTlZQ8F1XrWcP0" crossorigin="anonymous"></script>
</body>
</html>
