{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Autores')

{{-- Definimos el contenido --}}
@section('content')
<div class="container">
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notificación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Aquí puedes agregar el contenido de la notificación --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para mostrar el modal -->
    <script>
        $(document).ready(function(){
            // verifica si hay un mensaje de notificación en la sesión
            var notification = "{{ session('notification') }}";
            if (notification){
                $('#notificationModal').modal('show');
            }
        });
    </script>

    <h1>Autores</h1>
    <a href="/autores/create" class="btn btn-primary">Agregar Autor</a>
    <a class="btn btn-danger btn-sm" href="/report1">Reporte</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Biografía</th>
                <th>Fecha de nacimiento</th>
                <th>Nacionalidad</th>
                <th>Teléfono</th>
                <th>Website</th>
                <th>Foto</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->nombre }}</td>
                <td>{{ $autor->apellido }}</td>
                <td>{{ $autor->biografia }}</td>
                <td>{{ $autor->fecha_nacimiento }}</td>
                <td>{{ $autor->nacionalidad }}</td>
                <td>{{ $autor->telefono }}</td>
                <td>{{ $autor->website }}</td>
                <td>{{ $autor->foto }}</td>
                <td>{{ $autor->genero }}</td>
                <td>
                    <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" 
                        onclick="setDeleteForm('{{ route('autores.destroy', $autor->id) }}', '{{ $autor->nombre }} {{ $autor->apellido }}')">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar a <strong id="autorNombre"></strong>?</p>
                <p class="text-warning">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
function setDeleteForm(action, autorNombre) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('autorNombre').innerText = autorNombre;
}
</script>

@endsection
