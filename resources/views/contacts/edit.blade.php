@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Editar Contacto</h1>

        <!-- Formulario de edición de contacto -->
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="form-container">
            @csrf
            @method('PUT')

            <!-- Campo de nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $contact->name }}" required class="form-control">
            </div>

            <!-- Campo de email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $contact->email }}" required class="form-control">
            </div>

            <!-- Campo de teléfono -->
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" value="{{ $contact->phone }}" required class="form-control">
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-custom btn-lg">Actualizar</button>
        </form>
    </div>

    <!-- Estilos CSS directamente en la vista -->
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #495057;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            background-color: #ffffff;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            font-weight: bold;
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
    </style>
@endsection
