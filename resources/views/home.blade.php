@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1 class="text-center mb-4">Pantalla de inicio</h1>
    <style>
        h1 {
            padding: 10%;
        }
        .info-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .info-button:hover {
            background-color: #0056b3;
        }
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-title {
            font-size: 1.5rem;
        }
        .modal-body {
            background-color: #f8f9fa;
            color: #333;
            font-size: 1rem;
        }
        .modal-footer {
            border-top: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>

    <div class="text-center">
        <button class="info-button" data-toggle="modal" data-target="#infoModal">Información del Sistema</button>
    </div>

    <!-- Modal de Información -->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Sistema de Biblioteca de Préstamos y Devoluciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Nuestro sistema de biblioteca de préstamos y devoluciones te permite gestionar de manera eficiente los libros disponibles, así como llevar un control de los préstamos realizados.
                    Puedes crear, editar y eliminar recordatorios para asegurarte de que nunca se te pase la fecha de devolución.
                    <br><br>
                    ¡Explora nuestras funcionalidades y disfruta de una experiencia de lectura sin preocupaciones!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
