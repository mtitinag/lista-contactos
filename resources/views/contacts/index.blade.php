@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Lista de Contactos</h1>

        <!-- Mostrar mensajes de éxito y error -->
        @if (session('success')) {{-- Si hay un mensaje de éxito en la sesión, muestra una alerta verde --}}
            <div class="alert alert-success text-center mb-4"> {{-- Muestra el mensaje almacenado en la sesión bajo la clave 'success' --}}
                {{ session('success') }}
            </div>
        @endif

        @if (session('deleted')) {{-- Si hay un mensaje de eliminación en la sesión, muestra una alerta roja --}}
            <div class="alert alert-danger text-center mb-4">  {{-- Muestra el mensaje almacenado en la sesión bajo la clave 'deleted' --}}
                {{ session('deleted') }}
            </div>
        @endif

        <!-- Botón "Nuevo Contacto" con más estilo -->
        <div class="text-center mb-4">
            <a href="{{ route('contacts.create') }}" class="btn btn-lg btn-custom">Nuevo Contacto</a>
        </div>

        <!-- Tabla con estilo moderno -->
        <div class="table-responsive">
            <table class="table table-hover shadow-lg">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este contacto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginador  -->
        <div class="d-flex justify-content-center mt-3">
            <div class="text-center">
                <!-- Mostrar el rango de los resultados -->
                <span class="mr-3">Mostrando del {{ $contacts->firstItem() }} al {{ $contacts->lastItem() }} de {{ $contacts->total() }} resultados</span>
            </div>

            <div class="d-flex">
                <!-- Paginador personalizado sin flechas y eliminando Previous en la primera página y Next en la última -->
                @if ($contacts->onFirstPage())
                    <!-- Si estamos en la primera página, no mostramos el botón de 'Previous' -->
                    <button class="btn btn-secondary btn-sm" disabled>Anterior</button>
                @else
                    <a href="{{ $contacts->previousPageUrl() }}" class="btn btn-secondary btn-sm">Anterior</a>
                @endif

                @if ($contacts->hasMorePages())
                    <!-- Si hay más páginas, mostramos el botón 'Next' -->
                    <a href="{{ $contacts->nextPageUrl() }}" class="btn btn-secondary btn-sm">Siguiente</a>
                @else
                    <!-- Si estamos en la última página, deshabilitamos 'Next' -->
                    <button class="btn btn-secondary btn-sm" disabled>Siguiente</button>
                @endif
            </div>
        </div>
    </div>

    <!-- Estilos CSS directamente en la vista -->
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            font-weight: bold;
            padding: 15px 30px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:hover {
            background-color: #218838;
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            font-size: 16px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            border-radius: 8px;
        }

        table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }

        table tr {
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        table tr:hover {
            background-color: #e9ecef;
            transform: scale(1.02);
        }

        .btn {
            font-weight: bold;
            border-radius: 20px;
            padding: 5px 15px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        /* Estilo para el paginador */
        .pagination {
            margin: 0;
        }

        .pagination .page-item {
            margin: 0 2px; /* Reducir espacio entre botones */
        }

        .pagination .page-link {
            font-size: 12px; /* Reducir el tamaño del texto */
            padding: 3px 6px; /* Reducir tamaño de botones */
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .page-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }
    </style>
@endsection
